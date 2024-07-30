from flask import Flask, request, jsonify
import joblib
import pandas as pd

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

if __name__ == '__main__':
    app.run(debug=True)
