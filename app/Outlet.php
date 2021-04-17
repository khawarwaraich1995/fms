<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = [
        'name', 'url', 'phone', 'address', 'email', 'country', 'status', 'company_id', 'lat', 'long', 'city',
        'owner_name', 'minimum_order', 'post_code', 'state',
    ];
}
