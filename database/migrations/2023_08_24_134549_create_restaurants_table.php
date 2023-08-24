<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->text('description');
            $table->string('city', 30);
            $table->string('address', 50);
            $table->string('vat', 10);
            $table->string('url_image', 300)->nullable();
            $table->smallInteger('priceRange')->nullable();
            $table->tinyInteger('rating_value')->nullable();
            $table->smallInteger('review_count')->nullable();

            // creare la colonna della chiave esterna
            // $table->unsignedBigInteger('product_ID')->after('id');
            // $table->unsignedBigInteger('user_ID');
            // $table->unsignedBigInteger('order_ID');

            // definire la colonna come chiave esterna
            // $table->foreign('product_ID')->references('id')->on('products');
            // $table->foreign('user_ID')->references('id')->on('users');
            // $table->foreign('order_ID')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
