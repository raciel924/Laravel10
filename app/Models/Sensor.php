<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $table = 'sensors';

    protected $fillable = ['name', 'quantity', 'type_sensor_id'];

    public function typeSensor()
    {
        return $this->belongsTo(TypeSensor::class);
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class, 'sector_sensors');
    }
}