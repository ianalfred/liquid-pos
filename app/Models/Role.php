<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public const IS_ADMIN = 1;
    public const IS_CASHIER = 2;

    /**
     * Get the users for the role.
     */
    public function users() {
        return $this->hasMany(User::class);
    }
}
