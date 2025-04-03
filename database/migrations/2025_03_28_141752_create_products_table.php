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
            $table->string('p_id', 10)->primary()->comment('商品ID');
            $table->string('s_id', 7)->comment('出品店舗ID');
            $table->string('e_id', 10)->comment('出品者ID');
            $table->integer('c_id')->nullable()->comment('カテゴリID');
            $table->string('p_name', 50)->comment('商品名');
            $table->string('p_img', 255)->nullable()->comment('画像保存先');
            $table->integer('price')->comment('定価');
            $table->integer('dis_price')->comment('割引価格');
            $table->date('ex_dt')->nullable()->comment('賞味期限');
            $table->integer('p_status')->default(0)->nullable()->comment('出品状況 0:出品中 1:保留中 2:出品取消 3:販売済');
            $table->string('u_id', 5)->nullable()->comment('購入者ID');
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
