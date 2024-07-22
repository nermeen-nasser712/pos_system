<?php

namespace App\Models;
use App\Models\Category;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_name','product_name','description','image','purchase_price','sale_price','stock','category_id'];
    use Translatable; // 2. To add translation methods
    public $translatedAttributes = ['product_name','description'];

    
    public function category()
    {
        return $this->belongsTo(Category::class);

    }
    
}
