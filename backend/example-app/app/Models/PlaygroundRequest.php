<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaygroundRequest extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'sender',
        'playground_id'
    ];
}
