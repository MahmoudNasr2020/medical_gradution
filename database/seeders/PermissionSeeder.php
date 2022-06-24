<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            'عرض-القسم',
            'اضافة-القسم',
            'تعديل-القسم',
            'حذف-القسم',
            'عرض-المنتج',
            'حذف-المنتج',
            'عرض-المستخدم',
            'طلبات-المستخدم',
            'حذف-المستخدم',
            'عرض-الشركة',
            'حذف-الشركة',
            'منتجات-الشركة',
            'عرض-الطلب',
            'عرض-المسؤول',
            'اضافة-المسؤول',
            'تعديل-المسؤول',
            'حذف-المسؤول',
            'عرض-الصلاحية',
            'اضافة-الصلاحية',
            'تعديل-الصلاحية',
            'حذف-الصلاحية',
            'اتصل-بنا',
            'المحفظة',
            'الاعدادات',

        ];

        Permission::truncate();
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name'=>'admin']);
        }
    }
}
