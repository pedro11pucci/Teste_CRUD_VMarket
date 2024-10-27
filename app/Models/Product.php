<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "code",
        "description",
        "price"
    ];

    public static function rules($id = null) {
        return [
            "name"=> "required|string",
            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('products')->ignore($id)
            ],
            "price"=> "required|string",
            "suppliers"=> "required|array",
            "suppliers.*" => "exists:suppliers,id"
        ];
    }

    public static function messages() {
        return [
            'code.unique' => 'Este Código já está cadastrado'
        ];
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'suppliers_products');
    }
}
