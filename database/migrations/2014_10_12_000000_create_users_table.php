<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telpon');
            $table->string('alamat');
            $table->string('foto_ktp');
            $table->boolean('is_admin')->default(false);
            $table->boolean('status_partisipasi')->default(false);
            $table->boolean('status_draft')->default(true);
            $table->boolean('status_verifikasi')->default(false);
            $table->string('catatan_admin')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
