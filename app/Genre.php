<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Relations
     */
    public function videos()
    {
        return $this->belongsToMany(Video::class);
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

    /**
     * @return array
     */
    public static function forArray()
    {
        $options = [];
        $items = static::orderBy('id', 'ASC')->get(['id','name']);
        foreach ($items as $key => $item)
        {
            $options[$key]['id'] = $item->id;
            $options[$key]['name'] = $item->name;
        }
        return $options;
    }
}
