<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
        $products = [
            [
                'name'=>'Hand Sanitizer',
                'description' => 'وصف المنتج هو الكلمات والتعبيرات التسويقية التي يتم استخدامها بشكل منسق في شرح مزايا وخصائص المنتج وكافة المعلومات المرتبطة به.
ويتضمن أي نموذج وصف منتج الفوائد والتأثير الإيجابي الذي يعود على المستهلك من شراء هذا المنتج وتأكيد الطلب عليه.
هذه الكلمات والتعبيرات لابد من اختيارها بعناية فائقة حتى يمكنها تحقيق التأثير المطلوب على المتسوق بمجرد قرائتها، بحيث تدفعه دفعًا إلى الشراء دون تردد من خلال كتابة نص وصفي قصير.                                  ',
                'price'=>'220',
                'production_country'=>'Egypt',
                'image'=>'https://www.insiderintelligence.com/static/74e5ac20957d7f85ee5915de3fb21211/737e2/apple-watch.png',
                'category_id'=>1,
                'company_id'=>1,
            ],
            [
                'name'=>'Medical Mask',
                'description' => 'وصف المنتج هو الكلمات والتعبيرات التسويقية التي يتم استخدامها بشكل منسق في شرح مزايا وخصائص المنتج وكافة المعلومات المرتبطة به.
ويتضمن أي نموذج وصف منتج الفوائد والتأثير الإيجابي الذي يعود على المستهلك من شراء هذا المنتج وتأكيد الطلب عليه.
هذه الكلمات والتعبيرات لابد من اختيارها بعناية فائقة حتى يمكنها تحقيق التأثير المطلوب على المتسوق بمجرد قرائتها، بحيث تدفعه دفعًا إلى الشراء دون تردد من خلال كتابة نص وصفي قصير.',
                'price'=>'20',
                'production_country'=>'USA',
                'image'=>'https://media.wired.com/photos/613a905fa755c6a4b550ba89/master/w_2400,h_1800,c_limit/Gear-Face-Mask.jpg',
                'category_id'=>1,
                'company_id'=>1,
            ],
            [
                'name'=>'Medical Glass',
                'description' => 'وصف المنتج هو الكلمات والتعبيرات التسويقية التي يتم استخدامها بشكل منسق في شرح مزايا وخصائص المنتج وكافة المعلومات المرتبطة به.
ويتضمن أي نموذج وصف منتج الفوائد والتأثير الإيجابي الذي يعود على المستهلك من شراء هذا المنتج وتأكيد الطلب عليه.
هذه الكلمات والتعبيرات لابد من اختيارها بعناية فائقة حتى يمكنها تحقيق التأثير المطلوب على المتسوق بمجرد قرائتها، بحيث تدفعه دفعًا إلى الشراء دون تردد من خلال كتابة نص وصفي قصير.',
                'price'=>'90',
                'production_country'=>'USA',
                'image'=>'https://www.financialexpress.com/wp-content/uploads/2022/04/health-insurance-3a-1.jpg',
                'category_id'=>2,
                'company_id'=>1,
            ],
            [
                'name'=>'Isometric Equipment',
                'description' => 'وصف المنتج هو الكلمات والتعبيرات التسويقية التي يتم استخدامها بشكل منسق في شرح مزايا وخصائص المنتج وكافة المعلومات المرتبطة به.
ويتضمن أي نموذج وصف منتج الفوائد والتأثير الإيجابي الذي يعود على المستهلك من شراء هذا المنتج وتأكيد الطلب عليه.
هذه الكلمات والتعبيرات لابد من اختيارها بعناية فائقة حتى يمكنها تحقيق التأثير المطلوب على المتسوق بمجرد قرائتها، بحيث تدفعه دفعًا إلى الشراء دون تردد من خلال كتابة نص وصفي قصير.',
                'price'=>'180',
                'production_country'=>'USA',
                'image'=>'https://media.wired.com/photos/59266fd87034dc5f91beb699/master/w_2560%2Cc_limit/Medical-Device-4x3-467546179.jpg',
                'category_id'=>3,
                'company_id'=>1,
            ],
            [
                'name'=>'Blood Pressure Monitor',
                'description' => 'وصف المنتج هو الكلمات والتعبيرات التسويقية التي يتم استخدامها بشكل منسق في شرح مزايا وخصائص المنتج وكافة المعلومات المرتبطة به.
ويتضمن أي نموذج وصف منتج الفوائد والتأثير الإيجابي الذي يعود على المستهلك من شراء هذا المنتج وتأكيد الطلب عليه.
هذه الكلمات والتعبيرات لابد من اختيارها بعناية فائقة حتى يمكنها تحقيق التأثير المطلوب على المتسوق بمجرد قرائتها، بحيث تدفعه دفعًا إلى الشراء دون تردد من خلال كتابة نص وصفي قصير.',
                'price'=>'320',
                'production_country'=>'USA',
                'image'=>'https://azb4fstg-cdn-endpoint.azureedge.net/mediacontainer/medialibraries/smithersb4f/industries/life%20science/medical%20device/thumbnail/medical-device-testing-644x350.png?ext=.png',
                'category_id'=>4,
                'company_id'=>1,
            ],
            [
                'name'=>'New Microscope',
                'description' => 'وصف المنتج هو الكلمات والتعبيرات التسويقية التي يتم استخدامها بشكل منسق في شرح مزايا وخصائص المنتج وكافة المعلومات المرتبطة به.
ويتضمن أي نموذج وصف منتج الفوائد والتأثير الإيجابي الذي يعود على المستهلك من شراء هذا المنتج وتأكيد الطلب عليه.
هذه الكلمات والتعبيرات لابد من اختيارها بعناية فائقة حتى يمكنها تحقيق التأثير المطلوب على المتسوق بمجرد قرائتها، بحيث تدفعه دفعًا إلى الشراء دون تردد من خلال كتابة نص وصفي قصير.                                       ',
                'price'=>'420',
                'production_country'=>'USA',
                'image'=>'https://www.jnjmedtech.com/sites/default/files/styles/crop_presets/public/2022-03/image%20%281%29-min.png?itok=2kAgZZwq',
                'category_id'=>5,
                'company_id'=>1,
            ],
        ];

        Product::truncate();

        foreach ($products as $product)
        {
            Product::create([
                'name'=>$product['name'],
                'description' => $product['description'],
                'price'=>$product['price'],
                'production_country'=>$product['production_country'],
                'image'=>$product['image'],
                'category_id'=>$product['category_id'],
                'company_id'=>$product['company_id'],
            ]);
        }
    }
}
