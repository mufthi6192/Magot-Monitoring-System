
# MMS (Monitoring Magot System)

MMS (Monitoring Magot System) adalah sistem otomasi penegmbangbiakan magot berbasis Website dan Mikrokontroler.
Sistem website dibangun dengan PHP menggunakan Laravel framework, HTML, CSS dengan Bootstrap framework, dan JavaScript menggunakan bantuan jQuery dan Library pendukung lainnya.
Sistem Mikrokontroler dibangun dengan NodeMCU ESP8266 berbasis arduino.


## Authors

- [Mufthi Ryanda](https://www.instagram.com/mufthi_ryanda)


## Basic Installation

Untuk melakukan instalasi pastikan anda sudah menginstall PHP 8.1 Keatas
dan sudah menginstall composer. Berikut ini adalah tahapan untuk memulai
aplikasi.

Clone Project
```bash
  git clone https://github.com/mufthi6192/Magot-Monitoring-System.git
```

Hapus semua cache
```bash
  php artisan optimize:clear
```

Jalankan Migrasi
```bash
  php artisan migrate:fresh
```

Jalankan Seeder
```bash
  php artisan db:seed
```

Jalankan aplikasi
```bash
  php artisan serve
```
Sekarang aplikasi sudah berjalan sebagaimana semestinya.
Anda hanya perlu mengkoneksikan perangkat IoT dengan website
menggunakan endpoint yang ada pada routes.
    