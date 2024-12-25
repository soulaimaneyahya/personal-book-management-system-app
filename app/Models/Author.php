<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    public const TABLE = 'authors';
    public const ID_COLUMN = 'id';

    public const NAME_COLUMN = 'name';
    public const EMAIL_COLUMN = 'email';

    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';
    public const DELETED_AT_COLUMN = 'deleted_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME_COLUMN,
        self::EMAIL_COLUMN,
    ];

    public function getId(): string
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getName(): string
    {
        return $this->getAttribute(self::NAME_COLUMN);
    }

    public function getEmail(): string
    {
        return $this->getAttribute(self::EMAIL_COLUMN);
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
}
