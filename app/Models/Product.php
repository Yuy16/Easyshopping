<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define which columns are mass-assignable
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'image_path',
        'is_active',
    ];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
