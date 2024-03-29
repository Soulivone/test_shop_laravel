<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'category_name'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
