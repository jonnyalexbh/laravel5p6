<?php

namespace App;

use App\Events\CategoryDeleted;
use App\Events\CategorySaved;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = ['name'];
    protected $hidden = ['pivot'];
    /**
     * events
     *
     */
    protected $dispatchesEvents = [
        'saved' => CategorySaved::class,
        'deleted' => CategoryDeleted::class,
    ];

    /**
     * relationship books Many To Many
     *
     */
    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_category', 'category_id', 'book_id');
    }
}
