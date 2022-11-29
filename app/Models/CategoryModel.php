<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'category_name', 'category_desc', 'category_status', 'category_image', 'dvt_id'
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category_product';

    // public function category() {
    //     return $this->belongsTo('', 'category_id');
    // }
}
