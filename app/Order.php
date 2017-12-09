<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static $validationRules = [
        'user_id' => 'required|exists:users,id',
        'product_id' => 'required|exists:products,id',
        'count' => 'required|numeric|min:1',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'count',
    ];

    protected $guarded = [
        'sum',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
