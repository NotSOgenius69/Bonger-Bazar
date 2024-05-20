<?php
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
 function getCategories(){
    return Category::orderBy('id','ASC')->get();
 }
?>