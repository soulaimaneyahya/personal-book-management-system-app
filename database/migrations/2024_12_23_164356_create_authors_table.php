<?php

use App\Models\Author;
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
        Schema::create(Author::TABLE, function (Blueprint $table) {
            $table->uuid(Author::ID_COLUMN)->index()->primary();
            $table->string(Author::NAME_COLUMN);
            $table->string(Author::EMAIL_COLUMN)->unique();
            $table->timestamp(Author::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Author::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Author::DELETED_AT_COLUMN, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Author::TABLE);
    }
};
