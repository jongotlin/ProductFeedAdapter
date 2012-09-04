<?php

namespace ProductFeedAdapter\Network;

use ProductFeedAdapter\Network\Network;
use ProductFeedAdapter\Product;

class Adsettings extends Network
{

    public function __construct($feed)
    {
        $feed = str_replace('<![CDATA[]]>', '', $feed);
        $this->feed = $feed;
    }

    public function getProducts($from = null, $to = null)
    {
        $products = new \ArrayIterator();

        $dom = new \SimpleXMLElement($this->feed, LIBXML_NOCDATA);

        $i = 0;
        foreach ($dom->product as $feedProduct) {
            if ((is_null($from) || $i >= $from) && (is_null($to) || $i <= $to)) {
                $product = new Product();
                
                $product->setName($feedProduct->name);
                $product->setDescription((string)$feedProduct->description);
                $product->setPrice(str_replace(array(',', ' '), '', $feedProduct->price));
                $product->setTrackingUrl($feedProduct->productUrl);
                $product->setProductUrl($this->prepareProductUrl($feedProduct->productUrl));
                $product->setGraphicUrl($feedProduct->images->image['large']);
                $products->append($product);
            }
            $i++;
        }

        return $products;
    }

    protected function prepareProductUrl($trackingUrl)
    {
        return substr($trackingUrl, strpos($trackingUrl, 'url=')+4);
    }
}