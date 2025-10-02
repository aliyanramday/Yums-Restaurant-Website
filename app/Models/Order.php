<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;         // only has created_at, no updated_at

    protected $fillable = [
        'user_id',
        'total',
        'status',
        'created_at'                    // allow fill if you need it; else omit
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
