<?php
namespace App\Services;

use App\Category;
use App\CategoryRoot;
use App\Product;

class CategoryRankService
{

    public $rank;
    public $categoryTotal;
    public $categoryRankPercent;

    function __construct(Product $product)
    {
        $rank = preg_replace('/[#,]/i', "", $product->category_rank);
        $category = CategoryRoot::where('name', 'LIKE', "%" . $product->category . "%")->get()->first();
        if (!$category) {
            $category = Category::where('category_name', 'LIKE', "%" . $product->category . "%")->get()->first();
        }
        if($category){
        $percent = $rank / $category->total;
        $this->rank = $rank;
        $this->categoryTotal = $category->total;
        $this->categoryRankPercent = $percent * 100;
        }
//        dd($product->category, $rank, $category->total, $percent * 1000);
        return $this;
    }

}