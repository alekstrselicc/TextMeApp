<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privateChat extends Model
{
    use HasFactory;   
    public $timestamps = false;
    protected $fillable = [
        'name',
        'last_login'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,'participants', 'user_id','private_chat_id');
    }
    public function usrs()
    {
        return $this->belongsToMany(User::class,'private_messages', 'user_id','private_chat_id')->withPivot('message', 'created_at');
    }
}
