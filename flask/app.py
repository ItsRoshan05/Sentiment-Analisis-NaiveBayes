from flask import Flask, request, jsonify
import joblib

app = Flask(__name__)

# Load model dan TF-IDF Vectorizer yang telah disimpan
model = joblib.load('model/sentiment_model.joblib')
tfidf = joblib.load('model/tfidf_vectorizer.joblib')

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    text = data.get('text')
    
    if text:
        # Transform text menggunakan TF-IDF Vectorizer
        text_tfidf = tfidf.transform([text])
        
        # Prediksi menggunakan model
        prediction = model.predict(text_tfidf)[0]
        
        return jsonify({'prediction': prediction})
    else:
        return jsonify({'error': 'No text provided'}), 400

if __name__ == '__main__':
    app.run(debug=True)
