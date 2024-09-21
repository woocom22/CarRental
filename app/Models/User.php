<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
   protected $fillable =[
       'name',
       'email',
       'password'
   ];

   public function isAdmin()
   {
       return $this->role==='admin';
   }

   public function isCustomer()
   {
       return $this->role==='customer';
   }

   public function rentals(): HasMany
   {
       return $this->hasMany(Rental::class);
   }
   public function rental():hasMany
   {
       return $this->hasMany(Rental::class);
   }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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


}














