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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable()->index();

            $table->string('password');
            $table->rememberToken();
            
            $table->string('username')->unique()->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('bio')->nullable();
            $table->date('birth_date')->nullable()->index();
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->index();

            // Contact Information
            $table->string('phone_number')->nullable()->unique();
            $table->string('country_code', 5)->nullable()->index();
            $table->string('address')->nullable();

            // Additional Fields for Flexibility
            $table->json('settings')->nullable();
            $table->json('metadata')->nullable();

            // System & Status
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('inactive')->index();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignUuid('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
