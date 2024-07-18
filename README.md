# Sentiment Analysis Application

This project is a Sentiment Analysis application built using Laravel for the frontend and Flask for the backend. The application uses the Naive Bayes algorithm for sentiment classification.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)

## Features

- User authentication and registration.
- Sentiment analysis using Naive Bayes classifier.
- Integration of Flask API for prediction services.
- CRUD operations for managing data.

## Requirements

- PHP >= 7.3
- Composer
- Laravel 8.x
- Python 3.8
- Flask
- Scikit-learn
- MySQL or any other supported database

## Installation

### Backend (Flask)

1. Clone the repository:
   ```bash
   git clone git@github.com:yokim05/Sentiment-Analisis-NaiveBayes.git
   cd Sentiment-Analisis-NaiveBayes/backend
2. python3 -m venv venv
source venv/bin/activate  # Use `venv\Scripts\activate` on Windows
3. pip install -r requirements.txt
4. flask run

### Laravel

1. cd Sentiment-Analisis-NaiveBayes/sentiment-Komala
2. composer install
3. cp .env.example .env
php artisan key:generate
4. php artisan serve


