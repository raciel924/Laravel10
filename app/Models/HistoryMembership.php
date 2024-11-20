<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryMembership extends Model
{
    use HasFactory;

    protected $table = 'history_memberships';

    protected $fillable = ['start_date', 'end_date', 'active', 'memberships_id', 'client_id', 'permissions_id'];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}