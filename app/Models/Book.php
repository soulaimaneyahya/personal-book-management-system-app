<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public const TABLE = 'books';
    public const ID_COLUMN = 'id';
    public const AUTHOR_ID_COLUMN = 'author_id';

    public const NAME_COLUMN = 'name';
    public const PRICE_COLUMN = 'price';

    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';
    public const DELETED_AT_COLUMN = 'deleted_at';

    /**
     * Validation rules
     */
    public const NAME_RULES = ['bail', 'required', 'min:5', 'max:255'];
    public const PRICE_RULES = ['required', 'numeric', 'min:1'];

    public const CATEGORIES_RULES = ['nullable', 'array', 'exists:categories,id'];

    protected $fillable = [
        self::NAME_COLUMN,
        self::PRICE_COLUMN,
    ];

    public $sortable = [
        self::NAME_COLUMN, self::PRICE_COLUMN
    ];

    protected $casts = [
        self::PRICE_COLUMN => 'float',
    ];

    public function getId(): string
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getAuthorId(): string
    {
        return $this->getAttribute(self::AUTHOR_ID_COLUMN);
    }

    public function getName(): string
    {
        return $this->getAttribute(self::NAME_COLUMN);
    }

    public function getPrice(): float
    {
        return (float) $this->getAttribute(self::PRICE_COLUMN);
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

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
