<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'admin_logo', 'admin_favicon', 'admin_cover',
    ];
}
