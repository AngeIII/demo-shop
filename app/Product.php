<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jedrzej\Sortable\SortableTrait;

class Product extends Model
{
    use SoftDeletes;
    use SortableTrait;

    /**
     * @var array
     */
    public $sortable = ['*'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'count',
        'price',
    ];
}
