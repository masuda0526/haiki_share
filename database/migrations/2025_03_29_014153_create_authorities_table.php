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
        Schema::create('authorities', function (Blueprint $table) {
            $table->string('a_id', 2)->primary()->comment('権限ID');
            $table->integer('sort')->default(100)->comment('ソート用');
            $table->string('a_name', 10)->comment('権限名');
            $table->string('a_explain', 255)->nullable()->comment('権限説明');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorities');
    }
};
