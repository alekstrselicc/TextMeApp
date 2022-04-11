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
        'created_at'
    ];
    public function playground()
    {

        return $this->belongsTo(Playground::class);

    }
}
