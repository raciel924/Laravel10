<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'street', 'number_int', 'number_ext', 'colony', 'city', 'state', 'zip_code', 'country'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}