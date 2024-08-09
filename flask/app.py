from flask import Flask, request, jsonify
import joblib
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
import numpy as np
from transformers import pipeline
from sklearn.naive_bayes import MultinomialNB
from sklearn.pipeline import make_pipeline
from sklearn.model_selection import train_test_split

app = Flask(__name__)

# Load model and TF-IDF Vectorizer
model = joblib.load('model/sentiment_model.joblib')
tfidf = joblib.load('model/tfidf_vectorizer.joblib')

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    text = data.get('text')

    if text:
        # Transform text using TF-IDF Vectorizer
        text_tfidf = tfidf.transform([text])

        # Predict sentiment and score
        prediction = model.predict(text_tfidf)[0]
        score = model.predict_proba(text_tfidf)[0].max()  # Get the probability of the predicted class

        # Return prediction and score in JSON format
        return jsonify({'prediction': prediction, 'score': score})
    else:
        return jsonify({'error': 'No text provided'}), 400

@app.route('/data', methods=['GET'])
def get_data():
    # Load CSV data
    df = pd.read_csv('data/preprocessing.csv')
    
    # Convert DataFrame to JSON
    data_json = df.to_dict(orient='records')
    
    return jsonify(data_json)

@app.route('/datatfidf', methods=['GET'])
def datatfidf():
    # Load CSV data
    df = pd.read_csv('data/data_tfidf.csv')
    
    # Convert DataFrame to JSON
    data_json = df.to_dict(orient='records')
    
    return jsonify(data_json)

@app.route('/tfidf')
def get_tfidf():
    df = pd.read_csv('data/preprocessing.csv')
    X_train = df['cleaned_ulasan']  # Kolom teks
    y_train = df['Keterangan']  # Kolom label
    documents = df['cleaned_ulasan']
    
    vectorizer = TfidfVectorizer()
    X = vectorizer.fit_transform(documents)
    feature_names = vectorizer.get_feature_names_out()
    
    tfidf_matrix = X.toarray()
    df_counts = np.sum(tfidf_matrix > 0, axis=0)  # df
    idf = vectorizer.idf_
    
    model = make_pipeline(TfidfVectorizer(), MultinomialNB())
    model.fit(X_train, y_train)

    def get_sentiment(text):
        return model.predict([text])[0]
        
    data = []
    for i, term in enumerate(feature_names):
        term_occurrences = np.sum(tfidf_matrix[:, i])
        if term_occurrences > 0:
            tf = int(term_occurrences)
            tfidf = tfidf_matrix[:, i].sum()
            sentiment = get_sentiment(term)
            data.append({
                'Term': term,
                'tf': tf,
                'df': int(df_counts[i]),
                'idf': float(idf[i]),
                'tfidf': float(tfidf),
                'sentiment': sentiment
            })
    
    
    return jsonify(data)

@app.route('/predictions')
def get_predictions():
    df = pd.read_csv('data/preprocessing.csv')
    X = df['cleaned_ulasan']  # Kolom teks
    y = df['Keterangan']  # Kolom label
    
    # Membagi data menjadi data latih dan data uji
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.1, random_state=42)

    # Buat pipeline model
    model = make_pipeline(TfidfVectorizer(), MultinomialNB())
    model.fit(X_train, y_train)

    # Prediksi label untuk data uji
    predictions = model.predict(X_test)
    
    result = []
    for idx, text in enumerate(X_test):
        result.append({
            'Text': text,
            'Actual': y_test.iloc[idx],
            'Predicted': predictions[idx]
        })

    return jsonify(result)

if __name__ == '__main__':
    app.run(debug=True)
