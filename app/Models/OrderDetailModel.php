<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'order_detail_id','order_id_code', 'product_id', 'product_name','product_price','product_sale_quantity'
    ];
    protected $primaryKey = 'order_detail_id';
 	protected $table = 'tbl_order_detail';
    public function product() {
        return $this->belongsTo('App\Models\ProductModel', 'product_id');
    }
}
