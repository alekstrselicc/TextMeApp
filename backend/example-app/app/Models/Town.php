<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'town',
        'country_id'
    ];
    public function country()
    {

        return $this->belongsTo(Country::class);

    }
    public function users()
    {
         return $this->hasMany(User::class);
    }
}
