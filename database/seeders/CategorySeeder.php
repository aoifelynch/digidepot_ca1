<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = new Category;
        $category1->name = "Phones";
        $category1->category_image = "phoneCategory.jpg";
        $category1->save();

        $category2 = new Category;
        $category2->name = "PC Parts";
        $category2->category_image = "pcCategory.jpg";
        $category2->save();

        $category3 = new Category;
        $category3->name = "Tablets";
        $category3->category_image = "tabletCategory.webp";
        $category3->save();

        $category4 = new Category;
        $category4->name = "Laptops";
        $category4->category_image = "laptopCategory.webp";
        $category4->save();

        $category5 = new Category;
        $category5->name = "Accessories";
        $category5->category_image = "keyboardCategory.webp";
        $category5->save();
    }
}
