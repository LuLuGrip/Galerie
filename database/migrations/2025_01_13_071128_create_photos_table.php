<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('filename');  
            $table->string('path');      
            $table->string('title')->nullable(); // Přidáno
            $table->text('description')->nullable(); // Přidáno
            $table->timestamps();        
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('photos');
    }
};