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
        $sizes = [];
        for ($i = 36; $i < 50; $i += 2) {
            $sizes[] = $i;
        }
        Schema::create('posts', function (Blueprint $table) use ($sizes) {
            $table->id();
            $table->string('name',64);
            $table->string('type',64);
            $table->decimal('price', 20, 3);
            $table->integer('solid_number')->default('0');
            // $table->integer('frozen_number')->default('0');
            $table->tinyInteger('marketable_number');
            $table->enum('size', $sizes);
            $table->text('detail')->nullable();
            $table->text('image')->nullable();
            $table->enum('status',['enable','disable'])->default('enable');
            $table->timestamps();

            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
