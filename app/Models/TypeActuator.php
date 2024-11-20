<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeActuator extends Model
{
    use HasFactory;

    protected $table = 'type_actuator';

    protected $fillable = ['name'];

    public function actuators()
    {
        return $this->hasMany(Actuator::class);
    }
}