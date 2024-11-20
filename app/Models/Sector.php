<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $table = 'sectors';

    protected $fillable = ['name'];

    public function actuators()
    {
        return $this->belongsToMany(Actuator::class, 'actuators_sectors');
    }

    public function sensors()
    {
        return $this->belongsToMany(Sensor::class, 'sector_sensors');
    }
}