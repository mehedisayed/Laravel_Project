<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //protected $table = "user_table";
    public $timestamps = false;
    //const $CREATED_AT = 'create_time';
    //const $UPDATED_AT = 'updated_time';
    //protected $primaryKey = "pid";
    protected $table = "orderlog";
}
