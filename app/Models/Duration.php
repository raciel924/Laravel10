<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;

    protected $table = 'duration';

    protected $fillable = ['name', 'duration(days)'];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}