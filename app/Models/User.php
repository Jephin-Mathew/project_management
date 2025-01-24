<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;  // HasRoles gives access to role/permission methods

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',  // ensure the password is hashed properly
    ];

    /**
     * A user can have many leads.
     */
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    /**
     * Define the roles that can be assigned to this user.
     */
    public function assignRoleIfNotExists($role)
    {
        if (!$this->hasRole($role)) {
            $this->assignRole($role);
        }
    }

    /**
     * Get all the roles for this user.
     */
    public function getRoles()
    {
        return $this->getRoleNames();  // returns a collection of role names
    }
}
