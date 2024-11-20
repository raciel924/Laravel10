<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ['sensors_id', 'actuator_id'];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

    public function actuator()
    {
        return $this->belongsTo(Actuator::class);
    }
}