<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul layanan
            $table->text('description'); // Deskripsi layanan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};
