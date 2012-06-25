<?php

namespace ProductFeedAdapter\Network;

use ProductFeedAdapter\Network\Network;
use ProductFeedAdapter\Product;



class AdTraction extends Network
{
    public function getProducts($from = null, $to = null)
    {
        $products = new \ArrayIterator();

        $dom = new \SimpleXMLElement($this->feed);

        $i = 0;
        foreach ($dom->product as $feedProduct) {
            if ((is_null($from) || $i >= $from) && (is_null($to) || $i <= $to)) {
                $product = new Product();
                
                $product->setName($feedProduct->Name);

                $product->setDescription((string)$feedProduct->Description);
                $product->setPrice($feedProduct->Price);
                $product->setTrackingUrl($this->prepareTrackingUrl($feedProduct->TrackingUrl));
                $product->setProductUrl($feedProduct->ProductUrl);
                $product->setGraphicUrl($feedProduct->ImageUrl);
                $products->append($product);
            }
            $i++;          
        }

        return $products;
    }

    protected function prepareTrackingUrl($trackingUrl)
    {
        $url = str_replace('&amp;', '&', $trackingUrl);

        if (false !== strpos($url, '&epi=')) {
            $part1 = substr($url, 0, strpos($url, '&epi='));
            $part2 = substr($url, strlen($part1));
            $part2 = substr($part2, strpos($part2, '&', 2));

            $url = $part1 . '&epi=' . $part2;
        }
        return str_replace('&epi=&', '&epi='.Product::EPI_REPLACE_STRING.'&', $url);
    }

}