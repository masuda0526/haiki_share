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
        Schema::create('employers', function (Blueprint $table) {
            $table->string('e_id', 10)->primary()->comment('従業員ID 店舗コード＋従業員コード3桁');
            $table->string('s_id', 7)->comment('店舗ID');
            $table->string('e_cd', 3)->comment('従業員コード');
            $table->string('email', 50)->unique()->comment('従業員メールアドレス');
            $table->string('password', 255)->comment('パスワード');
            $table->string('auth', 255)->comment('従業員権限');
            $table->string('e_sei', 10)->comment('従業員名（姓）');
            $table->string('e_mei', 10)->comment('従業員名（名前）');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
