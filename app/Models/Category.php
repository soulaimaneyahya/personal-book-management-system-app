<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public const TABLE = 'categories';
    public const ID_COLUMN = 'id';
    public const NAME_COLUMN = 'name';
    public const PARENT_CATEGORY_ID_COLUMN = 'parent_category_id';

    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';
    public const DELETED_AT_COLUMN = 'deleted_at';

    /**
     * Validation rules
     */
    public const NAME_RULES = [
        'bail',
        'required',
        'min:5',
        'max:255'
    ];

    public const PARENT_CATEGORY_ID_RULES = [
        'nullable',
        'exists:categories,id'];

    protected $fillable = [
        self::NAME_COLUMN,
        self::PARENT_CATEGORY_ID_COLUMN,
    ];

    public function getId(): string
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getName(): string
    {
        return $this->getAttribute(self::NAME_COLUMN);
    }

    public function getParentCategoryId(): string
    {
        return $this->getAttribute(self::PARENT_CATEGORY_ID_COLUMN);
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

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, self::PARENT_CATEGORY_ID_COLUMN);
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class, self::PARENT_CATEGORY_ID_COLUMN);
    }

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }
}
