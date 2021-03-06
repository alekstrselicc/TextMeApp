<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens; 

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
        'birth',
        'img'
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
    public function privateChats()
    {
        return $this->BelongsToMany(privateChat::class,'participants','user_id','private_chat_id');
    }
    public function channels()
    {
        return $this->BelongsToMany(Channel::class,'messages','user_id','channel_id')->withPivot('messages', 'created_at');
    }
    public function pChats()
    {
        return $this->BelongsToMany(privateChat::class,'private_messages','user_id','private_chat_id')->withPivot('message', 'created_at');
    }
    public function playgrounds()
    {
        return $this->BelongsToMany(Playground::class,'playground_members','user_id','playground_id')->withPivot('joined', 'left');
    }
    public function friendRequest()
    {

        return $this->belongsTo(FriendRequest::class);

    }
}
