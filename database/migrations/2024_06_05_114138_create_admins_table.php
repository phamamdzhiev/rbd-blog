<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('admins')->insert([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => '$2y$12$aCS5TIqUglHCSpVqdY31Q.zyl/p7uYD3ysJBrJgghJ1N9vN0oLAXi', // admin
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
