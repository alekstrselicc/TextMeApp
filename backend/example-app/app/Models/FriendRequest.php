<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'created_at',
        'status',
        'sender',
        'approver'
    ];
    public function users()
    {
         return $this->hasMany(User::class);
    }
}
