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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->morphs('tokenable');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();

            // $table->unsignedBigInteger('restaurant_id');
            // $table->foreign('restaurant_id')->references('id')->on('restaurants');

            $table->timestamp('last_used_at')->nullable();
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
        Schema::dropIfExists('personal_access_tokens');

        // Schema::table('restaurants', function (Blueprint $table) {
        //     elimino la chiave esterna

        //     $table->dropForeign('restaurants_user_id_foreign');

        //     elimino la colonna

        //     $table->dropColumn('restaurant_id');
        // });
    }
};
