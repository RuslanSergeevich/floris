<?php

namespace common\models;

class ViewPrice {
    protected $retail;
    protected $wholesale;

    public function getRetail()
    {
        return $this->retail;
    }

    public function getWhole()
    {
        return $this->wholesale;
    }

    public function __construct($id)
    {
        $this->retail = PricesValues::getPriceValue(1, $id);
        $this->wholesale = PricesValues::getPriceValue(2, $id);
    }

}