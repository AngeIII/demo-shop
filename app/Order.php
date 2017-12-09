<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jedrzej\Sortable\SortableTrait;

class Order extends Model
{
    use SortableTrait;

    /**
     * @var array
     */
    public $sortable = ['*'];
}
