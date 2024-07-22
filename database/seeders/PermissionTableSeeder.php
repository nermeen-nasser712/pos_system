<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
'الاقسام',
'اضافة قسم',
'تعديل قسم',
'حذف قسم',
'المنتجات',
'اضافة منتج',
'تعديل منتج',
'حذف منتج',
'الطلبات',
'اضافة طلب',
'تعديل طلب',
'حذف طلب',
'العملاء',
'اضافة عميل',
'تعديل عميل',
'حذف عميل',
'المستخدمين',
'قائمة المستخدمين',
'صلاحيات المستخدمين',
'اضافة مستخدم',
'تعديل مستخدم',
'حذف مستخدم',
'عرض صلاحية',
'اضافة صلاحية',
'تعديل صلاحية',
'حذف صلاحية',


];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}