## Adat Mantu
## Aplikasi

Untuk mendapatkan APP_KEY jalankan php artisan key:generate
---
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:SBdJtFovbTwCcVbnWsB/hXt3uwwe0GwihBjLygT93Ao=
APP_DEBUG=true
APP_URL=http://localhost
---
# MySQL

Pastikan sudah ada database MySQL yang berjalan. Untuk migrasi jalankan perintah php artisan migrate. Untuk paksa migrasi maka jalankan perintah php artisan migrate:fresh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wedding_invitation
DB_USERNAME=root
DB_PASSWORD=

# Mailer

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=dde557fbf37512
MAIL_PASSWORD=ea6c3e8830b3f6
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="wedding-fabian-naifa@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
