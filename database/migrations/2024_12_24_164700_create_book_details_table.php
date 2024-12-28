<?php

use App\Models\BookDetails;
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
        Schema::create(BookDetails::TABLE, function (Blueprint $table) {
            $table->uuid(BookDetails::ID_COLUMN)->index()->primary();
            $table->foreignUuid(BookDetails::BOOK_ID_COLUMN)->constrained()
                ->on(\App\Models\Book::TABLE)
                ->onDelete('cascade');
            $table->string(BookDetails::DESCRIPTION_COLUMN, 700);
            $table->timestamp(BookDetails::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(BookDetails::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(BookDetails::DELETED_AT_COLUMN, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(BookDetails::TABLE);
    }
};
