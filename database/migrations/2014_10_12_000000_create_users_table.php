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
            $table->uuid('id')->primary();
            $table->enum('type', ['cpf','cnpj'])->default('cpf')->nullable();
            $table->string('name');
            $table->string('fantasy')->nullable();
            $table->string('email')->unique();
            $table->string('document')->nullable()->unique();
            $table->string('ie')->nullable()->unique();
            $table->string('rg')->nullable()->unique();
            $table->text('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->enum('status', ['deleted','draft','published']);
            $table->text('description')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
