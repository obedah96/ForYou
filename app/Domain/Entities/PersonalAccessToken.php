<?php
// App/Domain/Entities/PersonalAccessToken.php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    protected $table = 'personal_access_tokens';

    protected $fillable = [
        'name', 'token', 'abilities', 'expires_at', 'last_used_at', 'tokenable_id', 'tokenable_type'
    ];

    // إضافة علاقة polymorphic
    public function tokenable()
    {
        return $this->morphTo();
    }
}
