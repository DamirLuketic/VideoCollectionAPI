<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'confirmation_key', 'is_confirmed', 'country_code', 'is_visible'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relations
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    /**
     * Mutators / Setters
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
            $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Methods
     */

    /**
     * @param null $prepend
     * @return array
     */
    public static function toOptions($prepend=null)
    {
        $options = [];
        $items = static::orderBy('id', 'ASC')->get(['id','name']);
        foreach ($items as $item) {
            $options[$item['id']] = $item['name'];
        }
        return $options;
    }
}
