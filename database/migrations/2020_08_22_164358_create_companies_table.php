<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('fantasy')->nullable();
            $table->string('email')->unique();
            $table->string('document')->nullable()->unique();
            $table->string('ie')->nullable()->unique();
            $table->text('phone')->nullable();
            $table->text('site')->nullable();
            $table->text('cover')->nullable();
            $table->enum('status', ['deleted','draft','published'])->default('published');
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
