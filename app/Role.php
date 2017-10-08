<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
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
        return $this->hasMany(User::class);
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
