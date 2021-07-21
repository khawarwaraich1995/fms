<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Customers extends Model
{
    use HasApiTokens, Notifiable;
}
