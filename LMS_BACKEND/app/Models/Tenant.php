<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //
    use HasUuids;
        protected $fillable = [
        'name',
        'subdomain',
        'custom_domain',
        'logo_url',
        'primary_color',
        'subscription_plan',
        'subscription_status',
    ];


    protected $casts = [
        'subscription_plan' => 'string',
        'subscription_status' => 'string',
    ];
}
