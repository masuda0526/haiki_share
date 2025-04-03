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
        //
        Schema::table('users', function(Blueprint $table){
            $table->string('u_id', 5)->nullable(false)->after('id');
            $table->dropColumn('id');
            $table->primary('u_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function(Blueprint $table){
            $table->dropPrimary('u_id');
            $table->dropColumn('u_id');
            $table->bigIncrements('id');
        });
    }
};
