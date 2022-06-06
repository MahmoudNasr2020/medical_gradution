<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $categories = ['Pharmacy','Health & Nutrition','Personal Equipment','Diagnostic Sets','Microscope'
                        ,'Needle & Syringes','OT Therapy','First Aid','Transport','Heart Surgery'];

        Product::truncate();
        Category::truncate();
        foreach ($categories as $category)
        {
            Category::create(['category_name'=>$category]);
        }
    }
}
