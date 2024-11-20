<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuator extends Model
{
    use HasFactory;

    protected $table = 'actuators';

    protected $fillable = ['name', 'quantity', 'type_actuators_id'];

    public function typeActuator()
    {
        return $this->belongsTo(TypeActuator::class);
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class, 'actuators_sectors');
    }
}