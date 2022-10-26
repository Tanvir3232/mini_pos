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
        Schema::table('payments', function (Blueprint $table) {
           
            $table->string('note')->nullable()->change();
          
        });
        Schema::table('receipts', function (Blueprint $table) {
           
            $table->string('note')->nullable()->change();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
           
            $table->string('note')->change();
          
        });
        Schema::table('receipts', function (Blueprint $table) {
           
            $table->string('note')->change();
          
        });
    }
};