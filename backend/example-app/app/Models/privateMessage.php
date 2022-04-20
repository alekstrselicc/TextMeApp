<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privateMessage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'message',
        'created_at',
        'user_id',
        'private_chat_id'
    ];
}
