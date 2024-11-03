<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('class_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_category_id');
            $table->string('title');
            $table->text('image')->nullable();
            $table->text('description');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_contents');
    }
};
