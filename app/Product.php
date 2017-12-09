<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $guarded = [
        'price',
    ];

    /**
     * Get list of license types.
     *
     * @return array
     */
    public static function getList()
    {
        return self::orderBy('name')->pluck('name', 'id')->toArray();
    }
}
