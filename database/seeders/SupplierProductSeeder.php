<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = Supplier::all();
        $products = Product::all();

        foreach ($suppliers as $supplier) {
            $productToAssociate = $products->random(rand(1, 5))->pluck('id');
            $supplier->products()->attach($productToAssociate);
        }
    }
}
