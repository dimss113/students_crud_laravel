<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->required();
            $table->string('nrp', 10)->required()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
        // Drop kolom
    }
};

// table migrations pada phpmyadmin menyediakan informasi yaitu
// -table-table apa saja yang telah di migrate
// -apabila table yang telah dimigrate sudah ada maka tidak akan melakukan migrate lagi
// -terdapat data batch yang menunjukkan urutan table yang telah dimigrate
// command: php artisan migrate:rollback -> menghapus table yang telah dimigrate
// command: php artisan migrate -> membuat table baru
// command: php artisan make:migration create_students_table -> membuat file migration baru
// command: php artisan make:migration add_gender_column_to_students_table -> membuat file migration baru
// command: php artisan migrate:refresh -> menghapus table yang telah dimigrate dan membuat table baru
// command: php artisan migrate:refresh --seed -> menghapus table yang telah dimigrate dan membuat table baru beserta data dummy
// command: php artisan migrate:rollback --step=2 -> menghapus table yang telah dimigrate sebanyak 2 kali
// command: php artisan migrate:status -> menampilkan status table yang telah dimigrate
// command: php artisan migrate:fresh -> menghapus table yang telah dimigrate dan membuat table baru
// command: php artisan migrate:fresh --seed -> menghapus table yang telah dimigrate dan membuat table baru beserta data dummy
// command: php artisan migrate:install -> membuat table migrations
// command: php artisan migrate:reset -> menghapus table yang telah dimigrate
// command: php artisan migrate:rollback --pretend -> menampilkan table yang akan dihapus
// command: php artisan migrate:status --path=database/migrations/2023_07_26_081515_create_students_table.php -> menampilkan status table yang telah dimigrate
