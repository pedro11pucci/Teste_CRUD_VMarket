<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "cnpj",
        "location",
        "phone",
        "email"
    ];

    public static function rules($id = null) {
        return [
            "name"=> "required|string",
            'cnpj' => [
                'required',
                'string',
                'max:20',
                Rule::unique('suppliers')->ignore($id)
            ],
            "location"=> "required|string",
            "phone"=> "required|string",
            "email"=> "required|string|email"
        ];
    }
    
    public static function messages() {
        return [
            'cnpj.unique' => 'Este CNPJ já está cadastrado'
        ];
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'suppliers_products');
    }
}
