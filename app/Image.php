<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'video_id', 'is_cover', 'path'
    ];

    /**
     * Relations
     */
    public function video()
    {
        return $this->belongsTo(Video::class);
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
        $items = static::orderBy('id', ASC)->get(['id','path']);
        foreach ($items as $item) {
            $options[$item['id']] = $item['path'];
        }
        return $options;
    }
}
