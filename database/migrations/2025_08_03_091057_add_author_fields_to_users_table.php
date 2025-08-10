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
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
            $table->string('author_name')->nullable()->after('name');
            $table->text('author_bio')->nullable()->after('author_name');
            $table->string('author_email')->nullable()->after('email');
            $table->string('author_phone')->nullable()->after('author_email');
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['author_name', 'author_bio', 'author_email', 'author_phone']);
        });
    }
};
