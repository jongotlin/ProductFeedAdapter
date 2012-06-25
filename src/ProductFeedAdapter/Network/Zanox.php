<?php

namespace ProductFeedAdapter\Network;

use ProductFeedAdapter\Network\Network;
use ProductFeedAdapter\Product;

class Zanox extends Network
{
    public function getProducts($from = null, $to = null)
    {
        $products = new \ArrayIterator();

        $dom = new \SimpleXMLElement($this->feed);

        $i = 0;
        foreach ($dom->product as $feedProduct) {
            if ((is_null($from) || $i >= $from) && (is_null($to) || $i <= $to)) {
                $product = new Product();
                
                $product->setName($feedProduct->name);

                $product->setDescription((string)$feedProduct->description);
                $product->setPrice($feedProduct->price);
                $product->setTrackingUrl($feedProduct->deepLink);
                $product->setGraphicUrl($feedProduct->largeImage);
                $products->append($product);
            }
            $i++;
        }

        return $products;
    }

}