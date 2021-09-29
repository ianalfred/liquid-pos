<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public function getCreatedAtAttribute($value) {
        if(!empty($value)) {
            return date('j F, Y  g:i a', strtotime($value));
        }
    }

    /**
     * Get the role of a user.
     */
    public function role() {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the inventories made by the user.
     */
    public function inventories() {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Model Search
     */
    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->where('name', 'like', $term)
            ->orWhere('email', 'like', $term);
        });
    }
}
