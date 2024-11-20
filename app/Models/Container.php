<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $table = 'containers';

    protected $fillable = ['name', 'size_id', 'equipment_id'];

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function containerClients()
    {
        return $this->hasMany(ContainerClient::class);
    }
}