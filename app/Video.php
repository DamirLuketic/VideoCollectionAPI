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
        'user_id', 'media_type_id', 'condition_id', 'title', 'year', 'genres', 'country', 'directors', 'actors',
        'format', 'languages', 'subtitles', 'region', 'aspect_ratio', 'fsk', 'studio', 'release_date',
        'theatrical_release_date','run_time', 'ean', 'upc', 'isbn', 'asin', 'note', 'private_note', 'for_change',
        'buying_price'
    ];

    /**
     * Relations
     */
    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function media_type()
    {
        return $this->belongsTo(MediaType::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
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
        $items = static::orderBy('id', ASC)->get(['id','title']);
        foreach ($items as $item) {
            $options[$item['id']] = $item['title'];
        }
        return $options;
    }
}
