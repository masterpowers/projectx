<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Matryoshka\Cacheable;

class Profile extends Model
{
	use Cacheable;

    protected $table = 'profiles';

    protected $fillable = ['profile_pic', 'first_name', 'last_name', 'about_me', 'display_name', 'contact_no', 'address', 'city', 'province_state', 'zip_code', 'country'];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'social_account' => 'array',
        'contact_no' => 'array',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($profile) {
            $string = preg_replace('/\s+/', '', $profile->display_name);
            $filename  = time() . '-' . $string . '.png';
            $path = public_path('img/avatar/' . $filename);
            \Avatar::create($profile->display_name)->save($path,100);
            $profile->profile_pic = asset('img/avatar/'.$filename);

        });
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst(strtolower($value));
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
