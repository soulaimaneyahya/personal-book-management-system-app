<?php

use App\Models\BookCategory;
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
        Schema::create(BookCategory::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignUuid(BookCategory::CATEGORY_ID_COLUMN)->constrained();
            $table->foreignUuid(BookCategory::BOOK_ID_COLUMN)->constrained();
            $table->timestamp(BookCategory::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(BookCategory::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(BookCategory::DELETED_AT_COLUMN, 0)->nullable();

            $table->unique([BookCategory::CATEGORY_ID_COLUMN, BookCategory::BOOK_ID_COLUMN]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(BookCategory::TABLE);
    }
};
