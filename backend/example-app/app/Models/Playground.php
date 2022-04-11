<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playground extends Model
{
    use HasFactory;
    public $timestamps = false;
    //protected $table = 'playgrounds';
    protected $fillable = [
        'title'
    ];
    
    public function channels()
    {
         return $this->hasMany(Channel::class);
    }
}
