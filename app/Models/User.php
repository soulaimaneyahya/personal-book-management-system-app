<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasUuids;

    public const TABLE = 'users';
    public const ID_COLUMN = 'id';

    public const NAME_COLUMN = 'name';
    public const EMAIL_COLUMN = 'email';
    public const EMAIL_VERIFIED_AT_COLUMN = 'email_verified_at';

    public const PASSWORD_COLUMN = 'password';
    public const REMEMBER_TOKEN_COLUMN = 'remember_token';

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
        self::PASSWORD_COLUMN,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::PASSWORD_COLUMN,
        self::REMEMBER_TOKEN_COLUMN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        self::EMAIL_VERIFIED_AT_COLUMN => 'datetime',
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

    public function getEmailVerifiedAt(): ?Carbon
    {
        return $this->getAttribute(self::EMAIL_VERIFIED_AT_COLUMN);
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

    public function getRememberToken(): ?string
    {
        return $this->getAttribute(self::REMEMBER_TOKEN_COLUMN);
    }
}
