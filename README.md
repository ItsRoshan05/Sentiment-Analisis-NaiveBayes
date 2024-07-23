# Sentiment Analysis Application

Aplikasi ini melakukan analisis sentimen menggunakan metode TF-IDF dan Naive Bayes. Aplikasi ini dibangun dengan menggunakan framework Laravel untuk backend dan Flask untuk layanan machine learning.

## Daftar Isi

- [Fitur](#fitur)
- [Teknologi](#teknologi)
- [Persyaratan](#persyaratan)
- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)
- [Kontribusi](#kontribusi)   

## Fitur

- Analisis sentimen dari teks input pengguna.
- Menampilkan hasil analisis dalam bentuk positif, negatif, atau netral.
- Implementasi model machine learning menggunakan TF-IDF dan Naive Bayes.

## Teknologi

- Backend: Laravel
- Machine Learning: Flask
- Bahasa Pemrograman: PHP, Python
- Lainnya: HTML, CSS, JavaScript

## Persyaratan

- PHP >= 8.1.10
- Composer
- Python >= 3.10
- pip
- Laravel
- Flask
- scikit-learn

## Instalasi

### Backend (Laravel)

1. Clone repositori ini:
    ```bash
    git clone https://github.com/username/sentiment-analysis-app.git
    cd sentiment-analysis-app
    ```

2. Instal dependensi Laravel:
    ```bash
    composer install
    ```

3. Buat file `.env` dari contoh:
    ```bash
    cp .env.example .env
    ```

4. Generate application key:
    ```bash
    php artisan key:generate
    ```

5. Konfigurasi database di file `.env` sesuai dengan pengaturan database Anda.

6. Jalankan migrasi:
    ```bash
    php artisan migrate
    ```

7. Jalankan server Laravel:
    ```bash
    php artisan serve
    ```

### Machine Learning Service (Flask)

1. Masuk ke direktori `flask`:
    ```bash
    cd flask
    ```

2. Buat virtual environment:
    ```bash
    python -m venv venv
    ```

3. Aktifkan virtual environment:

    - Untuk Windows:
      ```bash
      venv\Scripts\activate
      ```
    - Untuk MacOS/Linux:
      ```bash
      source venv/bin/activate
      ```

4. Instal dependensi Python:
    ```bash
    pip install -r requirements.txt
    ```

5. Jalankan server Flask:
    ```bash
    flask run
    ```

## Penggunaan

1. Buka browser dan akses aplikasi Laravel:
    ```
    http://localhost:8000
    ```

2. Input teks yang ingin dianalisis sentimennya.

3. Klik tombol "Prediksi" dan hasil analisis sentimen akan ditampilkan.


## Kontribusi

Kontribusi sangat diterima! Silakan fork repositori ini dan buat pull request dengan perubahan yang diusulkan.

1. Fork repositori ini.
2. Buat branch fitur (`git checkout -b fitur-anda`).
3. Commit perubahan Anda (`git commit -am 'Tambah fitur'`).
4. Push ke branch (`git push origin fitur-anda`).
5. Buat Pull Request.

