<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';    // your SQL uses menu_items
    public $timestamps = false;         // your table has NO created_at/updated_at columns

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image_path'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'menu_item_id');
    }
}
