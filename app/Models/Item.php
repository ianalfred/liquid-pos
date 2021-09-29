<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'upc_ean',
        'name',
        'image',
        'category_id',
        'capacity_size',
        'cost_price',
        'selling_price',
        'description',
        'quantity',
    ];

    /**
     * Get the category of an item.
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the inventories for the item.
     */

    public function inventories() {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Defining a many to many relationship
     */
    public function sales() {
        return $this->belongsToMany(Sale::class, 'sale_items', 'item_id', 'sale_id')->withPivot('quantity', 'total_selling')->withTimestamps();
    }

    /**
     * Model Search
     */
    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->where('upc_ean', 'like', $term)
            ->orWhere('name', 'like', $term)
            ->orWhere('selling_price', 'like', $term);
        });
    }
}
