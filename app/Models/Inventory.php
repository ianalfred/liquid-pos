<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'user_id',
        'quantity',
        'remarks',
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
     * Get the item of an inventory.
     */
    public function item() {
        return $this->belongsTo(Item::class);
    }

    /**
     * Get the user who made the inventory.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
