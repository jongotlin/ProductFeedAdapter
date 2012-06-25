<?php

namespace ProductFeedAdapter;

class Product
{
    const EPI_REPLACE_STRING = '{{epi}}';

    private $name;
    private $description;
    private $price;
    private $trackingUrl;
    private $productUrl;
    private $graphicUrl;

    public function setName($name)
    {
        $this->name = (string)$name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = (string)$description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPrice($price)
    {
        $this->price = (string)$price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setTrackingUrl($trackingUrl)
    {
        $this->trackingUrl = (string)$trackingUrl;
    }

    public function getTrackingUrl($epi = '')
    {
        return str_replace(self::EPI_REPLACE_STRING, urlencode($epi), $this->trackingUrl);
    }

    public function setProductUrl($productUrl)
    {
        $this->productUrl = (string)$productUrl;
    }

    public function getProductUrl()
    {
        return $this->productUrl;
    }

    public function setGraphicUrl($graphicUrl)
    {
        $this->graphicUrl = (string)$graphicUrl;
    }

    public function getGraphicUrl()
    {
        return $this->graphicUrl;
    }

}