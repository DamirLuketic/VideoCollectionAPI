<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaType extends Model
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
    public function videos()
    {
        return $this->hasMany(Video::class);
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

    /**
     * @return array
     */
    public static function forArray()
    {
        $options = [];
        $items = static::orderBy('name', 'ASC')->get();
        foreach ($items as $key => $item)
        {
            $options[$key]['id'] = $item->id;
            $options[$key]['name'] = $item->name;
        }
        return $options;
    }
}
