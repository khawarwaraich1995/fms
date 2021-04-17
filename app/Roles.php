<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = [
        'title', 'status', 'permissions',
    ]; 

    public function admins(){
        return $this->hasMany('App\Users');
    }
}
