<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuids;
    public $incrementing = false;
    protected $keyType = 'string';
    //
    protected $fillable = [
        'image',
        'title',
        'category_id',
        'description',
        'price',
        'stock',
    ];
}
