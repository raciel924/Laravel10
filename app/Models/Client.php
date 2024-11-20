<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name', 'last_name', 'second_last_name', 'email', 'password', 'phone', 'adrress_id', 'active'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'adrress_id');
    }

    public function containerClients()
    {
        return $this->hasMany(ContainerClient::class);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}