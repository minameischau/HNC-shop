<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'customer_id', 'shipping_id', 'payment_id','order_status','order_time'
    ];
    protected $primaryKey = 'order_id';
 	protected $table = 'tbl_order';

}
