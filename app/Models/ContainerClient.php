<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerClient extends Model
{
    use HasFactory;

    protected $table = 'container_clients';

    protected $fillable = ['active', 'containers_id', 'clients_id'];

    public function container()
    {
        return $this->belongsTo(Container::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function containerFloors()
    {
        return $this->hasMany(ContainerFloor::class);
    }
}