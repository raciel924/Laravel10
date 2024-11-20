<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFloor extends Model
{
    use HasFactory;
    protected $table = 'type_floors';

    protected $fillable = ['name'];

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }
}
