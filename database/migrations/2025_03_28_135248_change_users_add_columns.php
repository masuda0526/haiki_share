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
        Schema::table('users', function(Blueprint $table){
            $table->string('u_sei', 10)->after('u_id')->comment('利用者名（姓）');
            $table->string('u_mei', 10)->after('u_sei')->comment('利用者名（名前）');
            $table->dropColumn('name');
            $table->string('u_pref',2)->after('remember_token')->comment('居住地（県）');
            $table->string('u_adrs', 255)->after('u_pref')->comment('住所');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('u_sei');
            $table->dropColumn('u_mei');
            $table->string('name', 255)->after('u_id');
            $table->dropColumn('u_pref');
            $table->dropColumn('u_adrs');
        });
    }
};
