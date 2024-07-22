# Sentiment Analysis Application

Proyek ini merupakan aplikasi Analisis Sentimen yang dibangun menggunakan Laravel untuk frontend dan Flask untuk backend. Aplikasi ini menggunakan algoritma Naive Bayes untuk klasifikasi sentimen.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)

## Features

- Otentikasi dan registrasi pengguna.
- Analisis sentimen menggunakan pengklasifikasi Naive Bayes.
- Integrasi Flask API untuk layanan prediksi.
- Operasi CRUD untuk mengelola data.

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
   ```
### Laravel

1. cd Sentiment-Analisis-NaiveBayes/sentiment-Komala
2. composer install
3. cp .env.example .env
php artisan key:generate
4. php artisan serve


