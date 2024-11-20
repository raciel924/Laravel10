<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActuatorSector extends Model
{
    use HasFactory;

    protected $table = 'actuators_sectors';

    protected $fillable = ['actuators_id', 'sector_id'];

    public function actuator()
    {
        return $this->belongsTo(Actuator::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}