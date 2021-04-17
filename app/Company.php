<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $fillable = [
      'name', 'email', 'phone', 'address', 'post_code', 'country', 'city', 'smtp_username', 'smtp_host', 'smtp_password', 'smtp_port', 'paypal_email', 'paypal_currency',
       'stripe_publish_key', 'stripe_secret_key', 'stripe_email', 'stripe_country', 'stripe_currency', 'facebook_link', 'insta_link', 'twitter_link', 'google_link',
       'status',
  ];

}
