<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $table = 'floors';

    protected $fillable = [
        'name', 'quantity_water', 'quantity_solar', 'humidity', 'altitude', 'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(TypeFloor::class);
    }
}