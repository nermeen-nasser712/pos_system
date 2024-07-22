<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name'];
    use Translatable; // 2. To add translation methods
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['category_name'];

}
