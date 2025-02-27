<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'name',
        'gender',
        'birth_year',
        'role',
        'is_deleted',
        'deleted',
        'email',
        'password',
    ];

    public function isAdmin()  {
        return $this->role === 0;
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function userMovies()
    {
        return $this->hasMany(UserMovie::class, 'user_id', 'id');
    }

    public function forumTopics()
    {
        return $this->hasMany(ForumTopic::class, 'user_id', 'id');
    }

    public function forumComments()
    {
        return $this->hasMany(ForumComment::class, 'user_id', 'id');
    }
}
