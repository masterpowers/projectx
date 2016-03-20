<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Laracasts\Matryoshka\Cacheable;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;
// use Laravel\Cashier\Billable;

class User extends Authenticatable
{
     use Cacheable, HasRolesAndAbilities, SyncableGraphNodeTrait;
    // use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected static $facebook_field_aliases = [
        'id' => 'facebook_id',
        'email' => 'email',
        'name' => 'username',
        'verified' => 'verified',
        'access_token' => 'access_token',
    ];

    protected static $graph_node_fillable_fields = ['id', 'username', 'email', 'verified', 'access_token'];

    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'access_token',
    ];
    
    protected $dates = ['created_at', 'updated_at'];
    
    protected $casts = [
        'verified' => 'boolean',
        'banned' => 'boolean',

    ];

    public function setUsernameAttribute($value)
    {
        $username = preg_replace('/\s+/', '_', $value);
        $this->attributes['username'] = strtolower($username);

    }
    
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) 
        {
        $this->attributes['password'] = \Hash::make($value);
        } 
        else
        {
        $this->attributes['password'] = \Hash::make($this->generatePassword(5));
        } 
    }
    
    protected function generatePassword($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
    }

    public function hasRole($roles)
    {
        if ($this->is('Admin')) {
            return true;
        }

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->isNot($role)) {
                    return false;
                }
            }

            return true;
        }
    }
}
