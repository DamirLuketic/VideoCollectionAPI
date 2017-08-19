<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'media_type_id', 'condition_id', 'title', 'year', 'directors', 'actors', 'format',
        'languages', 'subtitles', 'region', 'aspect_ratio', 'fsk', 'studio', 'release_date',
        'theatrical_release_date', 'run_time', 'ean', 'upc', 'isbn', 'asin', 'note', 'private_note',
        'for_change', 'buying_price'
    ];
}
