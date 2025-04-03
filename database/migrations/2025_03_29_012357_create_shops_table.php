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
        Schema::create('shops', function (Blueprint $table) {
            $table->string('s_id', 7)->comment('店舗ID C＋本店コード３桁＋支店コード３桁')->primary();
            $table->string('s_pcd', 3)->comment('本店コード');
            $table->string('s_ccd', 3)->comment('支店コード：本店は000');
            $table->string('s_name', 50)->comment('本店名');
            $table->string('s_stn', 50)->comment('支店名');
            $table->string('s_pref', 2)->comment('都道府県ID');
            $table->string('s_adrs', 255)->comment('店舗住所');
            $table->integer('s_status')->default(0)->comment('店舗ステータス 0:営業中 1:休業中 2:閉店');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
