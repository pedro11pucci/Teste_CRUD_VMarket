<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'suppliers_products');
    }
}
