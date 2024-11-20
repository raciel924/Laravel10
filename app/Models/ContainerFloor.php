<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerFloor extends Model
{
    use HasFactory;

    protected $table = 'container_floors';

    protected $fillable = ['container_client_id', 'floors_id', 'sector_id'];

    public function containerClient()
    {
        return $this->belongsTo(ContainerClient::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}