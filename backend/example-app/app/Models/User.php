<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'email',
        'password',
        'mobile',
        'last_name',
        'user_description',
        'lastLogin',
        'registeredAt',
        'status_id',
        'gender_id',
        'language_id',
        'relationship_id',
        'user_type_id',
        'town_id',
        'theme_id',
    ];
    public function status()
    {

        return $this->belongsTo(Status::class);

    }
    public function gender()
    {

        return $this->belongsTo(Gender::class);

    }
    public function town()
    {

        return $this->belongsTo(Town::class);

    }
    public function userType()
    {

        return $this->belongsTo(userType::class);

    }
    public function theme()
    {

        return $this->belongsTo(Theme::class);

    }
    public function relationship()
    {

        return $this->belongsTo(Relationship::class);

    }
    public function language()
    {

        return $this->belongsTo(Language::class);

    }
}
