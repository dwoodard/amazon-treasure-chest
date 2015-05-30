<?php
namespace App\Services;

use App\Category;
use App\Product;
use App\CategoryRoot;
use App\Services\CategoryRankService;

class ProductScoreService
{
    public $score = 1000;
    protected $product;

    function __construct($id)
    {
        $this->product = Product::find($id);
        $this->numOfFBA($this->product);
        $this->rankPercent($this->product);
        $this->weight($this->product);
        $this->soldByAmazon($this->product);
        $this->stars($this->product);
        $this->reviewsCount($this->product);
    }

    private function numOfFBA($product)
    {
        $this->setScore(($product->fba_sellers_total * 20));
    }

    private function rankPercent($product)
    {
        $category = new \App\Services\CategoryRankService($product);
        $rankScore = round($category->categoryRankPercent * 100, 0);

        if ($category->rank == null || $category->rank == 0) {
            $this->setScore(200);
        } else {
            $this->setScore($rankScore);
        }
        return $category;
    }

    private function weight($product)
    {
        $this->setScore(($product->weight * 1));
    }

    private function soldByAmazon($product)
    {
        if (strpos($product->sold_by, "sold by Amazon")) {
            $this->setScore(300);
        } else {
            $this->setScore(0);
        }
    }

    private function reviewsCount($product)
    {
        if ($product->customer_reviews_total < 20) {
            $this->setScore(50);
        } else {
            $this->setScore(0);
        }
    }

    private function stars($product)
    {
        if ($product->stars) {
            $this->setScore(round(200 / $product->stars));

        } else {
            $this->setScore(200);
        }
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

    private function CharsInDescription($product)
    {
    }

    private function fullfilledByAmazon($product)
    {
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return round($this->score);
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $this->score - $score;
    }

}