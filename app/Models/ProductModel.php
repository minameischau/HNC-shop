<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name','category_id','product_desc','product_price','product_image','product_status'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';
}
