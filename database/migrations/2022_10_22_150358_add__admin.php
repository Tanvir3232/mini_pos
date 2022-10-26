<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = [
             'name'     => 'Tanjim Ahmad',
             'email'    => 'tanjimahmad@gmail.com',
             'password' => Hash::make(123456),
             'phone'    => '01732328171',
             'email_verified_at' => now()
        ];

        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
