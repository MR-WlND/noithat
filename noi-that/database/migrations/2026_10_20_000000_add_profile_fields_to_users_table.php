<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('title')->nullable()->default('Trưởng nhóm Thiết Kế')->after('name');
            $table->string('phone')->nullable()->default('0988.248.868')->after('email');
            $table->text('bio')->nullable()->after('phone');
            $table->string('role')->nullable()->default('KTS Trưởng nhóm')->after('bio');
            $table->boolean('two_factor_enabled')->default(true)->after('role');
            $table->string('avatar')->nullable()->after('two_factor_enabled');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['title', 'phone', 'bio', 'role', 'two_factor_enabled', 'avatar']);
        });
    }
};
