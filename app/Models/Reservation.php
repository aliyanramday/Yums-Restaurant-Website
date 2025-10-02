<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'date',
        'time',
        'party_size',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
