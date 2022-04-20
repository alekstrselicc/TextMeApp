<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playgroundMember extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'left',
        'joined',
        'user_id',
        'playground_id'
    ];
}
