<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    public $timestamps = false;
    protected $fillable = [
        'code',
        'name'
    ];

    /**
     * @param null $prepend
     * @return array
     */
    public static function toOptions($prepend=null)
    {
        $options = [];
        $items = static::orderBy('name', ASC)->get(['code','name']);
        foreach ($items as $item) {
            $options[$item['code']] = $item['name'];
        }
        return $options;
    }
}