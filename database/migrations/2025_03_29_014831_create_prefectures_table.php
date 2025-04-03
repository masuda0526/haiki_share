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
        Schema::create('prefectures', function (Blueprint $table) {
            $table->string('pref_id', 2)->primary()->comment('都道府県ID');
            $table->integer('sort')->default(100)->comment('ソート用');
            $table->integer('r_id')->comment('地方ID');
            $table->string('pref_name' ,10)->comment('都道府県名');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefectures');
    }
};
