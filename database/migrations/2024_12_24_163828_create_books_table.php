<?php

use App\Models\Book;
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
        Schema::create(Book::TABLE, function (Blueprint $table) {
            $table->uuid(Book::ID_COLUMN)->index()->primary();
            $table->string(Book::NAME_COLUMN, 255);
            // Decimal for price, allowing for precision
            $table->decimal(Book::PRICE_COLUMN, 10, 4);
            $table->timestamp(Book::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Book::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Book::DELETED_AT_COLUMN, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Book::TABLE);
    }
};
