<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorSector extends Model
{
    use HasFactory;

    protected $table = 'sector_sensors';

    protected $fillable = ['sensors_id', 'sector_id'];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}