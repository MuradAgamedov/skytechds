<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllSeo extends Model
{
    protected $fillable = [
        'is_indexed',
        'is_followed',
        'meta_header',
        'meta_footer',
    ];
}
