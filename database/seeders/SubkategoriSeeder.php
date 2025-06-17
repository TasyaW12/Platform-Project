<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
class SubkategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil kategori berdasarkan nama
        $beauty = Category::where('name', 'Beauty')->first();
        $cooking = Category::where('name', 'Cooking')->first();
        $creative = Category::where('name', 'Creative Touch')->first();

        // Data subkategori per kategori
        $data = [
            $beauty->id => ['Facial', 'Make Up', 'Hair Styling'],
            $cooking->id => ['Healthy Food', 'Snack', 'Baking'],
            $creative->id => ['Crafting', 'Handlettering', 'DIY Gifts'],
        ];

        foreach ($data as $categoryId => $subcategories) {
            foreach ($subcategories as $sub) {
                Subcategory::create([
                    'name' => $sub,
                    'category_id' => $categoryId,
                ]);
            }
        }
    }
}



