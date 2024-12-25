<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(User::TABLE, function (Blueprint $table) {
            $table->uuid(User::ID_COLUMN)->index()->primary();
            $table->string(User::NAME_COLUMN);
            $table->string(User::EMAIL_COLUMN)->unique();
            $table->timestamp(User::EMAIL_VERIFIED_AT_COLUMN)->nullable();
            $table->string(User::PASSWORD_COLUMN);
            $table->string(User::REMEMBER_TOKEN_COLUMN, 100)->nullable();
            $table->timestamp(User::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(User::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(User::DELETED_AT_COLUMN, 0)->nullable();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
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
        Schema::dropIfExists(User::TABLE);
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
