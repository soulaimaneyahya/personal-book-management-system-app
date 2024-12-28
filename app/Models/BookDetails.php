<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookDetails extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public const TABLE = 'book_details';
    public const ID_COLUMN = 'id';
    public const BOOK_ID_COLUMN = 'book_id';

    public const DESCRIPTION_COLUMN = 'description';

    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';
    public const DELETED_AT_COLUMN = 'deleted_at';

    /**
     * Validation rules
     */
    public const DESCRIPTION_RULES = ['required', 'min:5', 'max:700'];

    protected $fillable = [
        self::DESCRIPTION_COLUMN,
    ];

    public function getId(): string
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getBookId(): string
    {
        return $this->getAttribute(self::BOOK_ID);
    }

    public function getDescription(): string
    {
        return $this->getAttribute(self::DESCRIPTION_COLUMN);
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

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withTimestamps();
    }
}
