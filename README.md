# Adat Mantu

## Aplikasi

Untuk mendapatkan `APP_KEY`, jalankan perintah:

php artisan key:generate


Contoh environment variable untuk aplikasi:

APP_NAME=Laravel
APP_ENV=local
APP_KEY= . . .
APP_DEBUG=true
APP_URL=[http://localhost](https://mantuxipplg4.smktelkom-pwt.sch.id)


---

## MySQL

Pastikan sudah ada database MySQL yang berjalan.

Untuk migrate:

php artisan migrate

Untuk paksa migrate (hapus semua tabel & buat ulang):

php artisan migrate:fresh

Contoh konfigurasi database:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wedding_invitation
DB_USERNAME=root
DB_PASSWORD=


---

## Mailer

Konfigurasi mailer menggunakan Mailtrap:



MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=dde557fbf37512
MAIL_PASSWORD=ea6c3e8830b3f6
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="wedding-fabian-naifa@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
