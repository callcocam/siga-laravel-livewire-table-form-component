<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('zip', 20)->nullable();
            $table->string('city')->nullable();
            $table->string('state', 3)->nullable();
            $table->string('country', 50)->default("BRASIL")->nullable();
            $table->string('street')->nullable();
            $table->string('district')->nullable();
            $table->string('number', 10)->nullable();
            $table->string('complement')->nullable();
            $table->integer('ordering')->default(0)->nullable();
            $table->uuidMorphs('addresable');
            $table->enum('status', ['deleted','draft','published'])->default('published');
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['tenant_id','slug']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
