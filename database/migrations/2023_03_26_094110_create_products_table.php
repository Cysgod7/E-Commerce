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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',70);
            $table->string('product_slug',70);
            $table->text('product_des');
            $table->Integer('brand_id');
            $table->Integer('cat_id');
            $table->date('entry_date');
            $table->string('product_price',10);
            $table->tinyInteger('product_status')->comment('1=show , 0 = not show');
            $table->text('product_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
