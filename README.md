TUGAS PROJECT TM TECHNOLOGY
JL. Surapati No.157

Dibangun dengan Menggunakan
-Laravel 5.5
-Laravel Material Design

Fitur
-User Authentication
-Registrasi dengan Konfirmasi email
-Lupa password
-Captcha

###### Instalasi
1. Jalankan di Console / Command Line `sudo git clone https://github.com/godbagas/user-management-laravel.git user_management`
2. Buat database menggunakan MySQL
    * ```mysql -u root -p```,
    * ```create database user_management;```
    * ```\q```
    Atau buat manual di ```localhost/phpmyadmin```
3. Lalu pindah ke direktori project menggunakan `cd user_management` lalu jalankan perintah `cp .env.example .env`
4. Edit file `.env` setting nama database username database dan passwordnya
5. Jalankan `sudo composer install`
6. Jalankan perintah `sudo chmod -R 755 ../laravel-material-design` untuk mengganti permission
7. Jalankan perintah `sudo php artisan key:generate`
8. Jalankan perintah untuk migrate database `sudo php artisan migrate`
9. Jalankan perintah `sudo composer dump-autoload`
10. Jalankan perintah untuk mengisi table database yg masih kosong `sudo php artisan db:seed`

#### Cara menjalankan project
1. Jalankan perintah `php artisan serve` di folder project tsb
