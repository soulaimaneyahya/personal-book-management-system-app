<?php

use App\Models\Image;
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
        Schema::create(Image::TABLE, function (Blueprint $table) {
            $table->uuid(Image::ID_COLUMN)->index()->primary();
            $table->string(Image::PATH_COLUMN, 255);

            $table->string(Image::IMAGEABLE_TYPE_MORPH);
            $table->uuid(Image::IMAGEABLE_ID_MORPH);

            $table->timestamp(Image::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Image::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Image::DELETED_AT_COLUMN, 0)->nullable();

            // unique constraint in Laravel is indexed
            $table->index(
                [Image::IMAGEABLE_TYPE_MORPH, Image::IMAGEABLE_ID_MORPH],
                'idx_imageable_type_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Image::TABLE);
    }
};
