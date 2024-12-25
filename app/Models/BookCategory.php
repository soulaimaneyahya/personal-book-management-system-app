<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookCategory extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public const TABLE = 'book_category';

    public const ID_COLUMN = 'id';
    public const CATEGORY_ID_COLUMN = 'category_id';
    public const BOOK_ID_COLUMN = 'book_id';

    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';
    public const DELETED_AT_COLUMN = 'deleted_at';

    public function getId(): string
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute(self::CREATED_AT_COLUMN);
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->getAttribute(self::UPDATED_AT_COLUMN);
    }

    public function getDeletedAt(): ?Carbon
    {
        return $this->getAttribute(self::DELETED_AT_COLUMN);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
