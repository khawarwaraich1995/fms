<?php

namespace App;

use App\Categories;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'outlet_id', 'item_name', 'item_cat_id', 'item_price', 'item_image', 'item_description', 'itemDiscount_status', 'item_discount',
        'item_discount_type', 'itemVat_status','item_vat', 'has_extras','is_featured','status',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'item_cat_id');
    }
}
