# Project Kantin Kejujuran SD SEA - COMFEST 2022

- Aplikasi ini menggunakan Framework Laravel versi 8
## Panduan Penggunaan Git

* [Panduan Fitur dan Penggunaan Aplikasi](https://github.com/EkoSetiyo13/kantin-kejujuran-comfest/info)

## Cara instalasi di localhost
### Requirement
- PHP minimal versi 7.3.0 maksimal versi 7.4.19
- Database MySQL
- Composer
- Jika menggunakan XAMPP, pastikan versi yang terinstall maksimal 7.4.19

### Instalasi
1. Clone repository
2. Masuk ke direktori project
3. Install dependency dengan cara run command `composer install` di terminal
4. Install dependency npm dengan cara run comman `npm install` di terminal
5. Buat file .env, bisa copy dari file .env.example
6. Atur konfigurasi di file .env (nama database, nama host, dll)
7. Buat database dengan nama sesuai dengan nama database yang di atur dalam file .env
8. Run command `php artisan migrate --seed` untuk generate db ke local Anda;
   
   Run command `php artisan migrate:fresh --seed` kalau ingin me-refresh db (misalkan ada perubahan tabel di dalam database)
90. Run command `php artisan key:generate`
10. Run command `php artisan serve`


## Informasi login yang tersedia
| No | ID | Password |
| ------------- | ------------- | ------------- |
| 1 | 12306  |  siswa123  |
| 2 | 44412  | siswa123  |


# Name Apps: Kantin Kejujuran
- User : student
- Activitas : Add, Sell, Buy
- Product Attribut: name, image, description, price, timestamp
- sorting : created, name
- All can add kantin's balance, max unlimited
- All can withdraw, kantin's balance

Plan and Design :
- home view [v]
- product view [v]
- product detail view [v]
- login view [v] 
- register view [v]
- add balance view [v]
- withdraw view [v]
- checkout view [v]
- add product view [v]
- sorting component [v]

- login action [v]
- register action [v]
- logout action [v]


