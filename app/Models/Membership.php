<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $table = 'memberships';

    protected $fillable = ['name', 'price', 'duration_id'];

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}