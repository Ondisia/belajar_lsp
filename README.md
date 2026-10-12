Latihan Kelas XII 2026
Langkah-langkah yang harus dilakukan

Buat Migrasi (Sesuai urutan dibawah)
Buat View Menggunakan konsep Blade Templating
Cara membuat Model + Migration

php artisan make:model Kategori -m

php artisan make:model Penulis -m

php artisan make:model Berita -m

Cara menjalankan migration

php artisan migrate

php artisan migrate:fresh

jika ada perubahan pada migration
Cara membuat Controller

php artisan make:controller ControllerPenulis -r

php artisan make:controller ControllerBerita -r

Cara link storage

php artisan storage:link


9. Perintah tambahan yang berguna
Perintah	Fungsi
php artisan serve	Menjalankan server pengembangan Laravel
php artisan route:list	Melihat daftar route yang terdaftar
php artisan migrate:status	Memeriksa status migration
php artisan make:migration nama_migration	Membuat migration baru
php artisan make:seeder BeritaSeeder	Membuat seeder untuk mengisi data contoh
php artisan db:seed	Menjalankan seeder
php artisan optimize:clear	Membersihkan cache optimasi Laravel
