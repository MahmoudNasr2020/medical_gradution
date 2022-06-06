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
        $categories = ['مجموعة أدوية','الصحة والتغذية','المعدات الشخصية','مجموعات التشخيص','مجهر'
                        ,'الإبر والمحاقن','علاج OT','إسعافات أولية','المواصلات','جراحة القلب'];

        Product::truncate();
        Category::truncate();
        foreach ($categories as $category)
        {
            Category::create(['category_name'=>$category]);
        }
    }
}
