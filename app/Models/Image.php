<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public const TABLE = 'images';
    public const ID_COLUMN = 'id';
    public const PATH_COLUMN = 'path';

    public const RELATION_MORPH = 'imageable';
    public const IMAGEABLE_ID_MORPH = 'imageable_id';
    public const IMAGEABLE_TYPE_MORPH = 'imageable_type';

    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';
    public const DELETED_AT_COLUMN = 'deleted_at';

    protected $fillable = ['path'];

    protected $appends = ['url'];

    public const IMAGE_RULES_CREATE = [
        'nullable',
        'image',
        'mimes:jpg,jpeg,png,webp',
        'max:2048'
    ];

    public const IMAGE_RULES_UPDATE = [
        'nullable',
        'image',
        'mimes:jpg,jpeg,png,webp',
        'max:2048'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::ID_COLUMN,
        self::PATH_COLUMN,
        self::IMAGEABLE_ID_MORPH,
        self::IMAGEABLE_TYPE_MORPH,
        self::CREATED_AT_COLUMN,
        self::UPDATED_AT_COLUMN,
        self::DELETED_AT_COLUMN,
    ];

    public function getId(): string
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getPath(): string
    {
        return $this->getAttribute(self::PATH_COLUMN);
    }

    public function imageable(): MorphTo
    {
        return $this->morphTo();
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

    public function getUrlAttribute(): string
    {
        return Storage::url($this->path);
    }
}
