<?php
namespace App\Services;

use App\Category;
use App\Product;
use App\CategoryRoot;

class ProductScoreService
{
    public $score = 1000;
    protected $product;

    function __construct($id)
    {
        $this->product = Product::find($id);
//        $this->score = $this->numOfFBA($this->product);
        $this->score = $this->rankPercent($this->product);
        return $this->score;
    }

    private function numOfFBA($product)
    {
        return $this->score - ($product->fba_sellers_total * 30);
    }

    private function rankPercent($product)
    {
        $category = \App\Services\CategoryRankService($product);

        return $category;
    }

    private function bulletPoints($product)
    {
    }

    private function totalImages($product)
    {
    }

    private function highResImages($product)
    {
    }

    private function stars($product)
    {
    }

    private function reviewsCount($product)
    {
    }

    private function CharsInDescription($product)
    {
    }

    private function fullfilledByAmazon($product)
    {
    }


}