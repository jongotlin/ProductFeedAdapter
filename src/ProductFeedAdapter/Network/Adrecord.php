<?php

namespace ProductFeedAdapter\Network;

use ProductFeedAdapter\Network\Network;
use ProductFeedAdapter\Product;

class Adrecord extends Network
{
    public function getProducts($from = null, $to = null)
    {
        $products = new \ArrayIterator();

        $feedProducts = json_decode($this->feed);

        foreach ($feedProducts->products as $key => $feedProduct) {
            if ((is_null($from) || $key >= $from) && (is_null($to) || $key <= $to)) {
                $product = new Product();
                $product->setName($feedProduct->name);
                $product->setDescription($feedProduct->description);
                $product->setPrice($feedProduct->price);
                $product->setTrackingUrl($this->prepareTrackingUrl($feedProduct->productUrl));
                $product->setProductUrl($this->prepareProductUrl($product->getTrackingUrl()));
                $product->setGraphicUrl($feedProduct->graphicUrl);

                $products->append($product);
            }
        }

        return $products;
    }

    protected function prepareTrackingUrl($trackingUrl)
    {
        $url = str_replace('&amp;', '&', $trackingUrl);
        $url = str_replace('&url=', '&epi='.Product::EPI_REPLACE_STRING.'&url=', $url);
        return $url;
    }

    protected function prepareProductUrl($trackingUrl)
    {
        return substr($trackingUrl, strpos($trackingUrl, 'url=')+4);
    }

}