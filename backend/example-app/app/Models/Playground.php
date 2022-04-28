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
        'title',
        'img'
    ];
    
    public function channels()
    {
         return $this->hasMany(Channel::class);
    }
    public function users()
    {
        return $this->BelongsToMany(User::class,'playground_members','user_id','playground_id')->withPivot('joined', 'left');
    }
}
