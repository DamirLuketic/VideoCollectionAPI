<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $table = 'countries';
    public $timestamps = false;
    protected $fillable = [
        'code', 'name'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relations
     */
    public function users()
    {
        $this->hasMany(User::class, 'code', 'country_code');
    }
    public function videos()
    {
        $this->belongsToMany(Video::class, 'country_video', 'code', 'country_code');
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
        $items = static::orderBy('name', 'ASC')->get(['id','name']);
        foreach ($items as $item) {
            $options[$item['id']] = $item['name'];
        }
        return $options;
    }
}
