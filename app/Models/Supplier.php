<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            "name"=> "required|string|",
            "cnpj"=> "required|string|unique:suppliers,cnpj,".$id,
            "location"=> "required|string",
            "phone"=> "required|string",
            "email"=> "required|string|"
        ];
    }

    public static function messages() {
        return [
            'cnpj.unique' => 'Este CNPJ já está cadastrado'
        ];
    }
}
