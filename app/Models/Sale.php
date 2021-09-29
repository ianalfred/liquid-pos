<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_type',
        'remarks',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sale_item() {
        return $this->hasMany(SaleItem::class);
    }

    /**
     * Defining a many to many relationship
     */
    public function items() {
        return $this->belongsToMany(Item::class, 'sale_items', 'sale_id', 'item_id')->withPivot('quantity', 'total_selling')->withTimestamps();
    }

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
     * Model Search
     */
    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->where('id', 'like', $term);
        });
    }
}
