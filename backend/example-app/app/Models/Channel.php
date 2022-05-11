<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'created_at',
        'playground_id',
        'accessibility'
    ];
    public function playground()
    {

        return $this->belongsTo(Playground::class);

    }

    public function users()
    {
        return $this->belongsToMany(User::class,'messages', 'user_id','channel_id')->withPivot('messages', 'created_at');
    }
}
