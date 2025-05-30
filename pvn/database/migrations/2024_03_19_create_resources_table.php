<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->text('description');
            $table->json('categories');
            $table->string('file_path')->nullable();
            $table->string('url')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('views')->default(0);
            $table->integer('downloads')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resources');
    }
}; 