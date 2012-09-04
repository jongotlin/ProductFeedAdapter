<?php

namespace ProductFeedAdapter\Test;

use ProductFeedAdapter\Network\NetworkFactory;
use ProductFeedAdapter\Network\Adsettings;
use ProductFeedAdapter\Product;

class AdsettingsTest extends \PHPUnit_Framework_TestCase
{
    private $adsettings;
    private $product;

    public function setUp()
    {
        $feed = '<?xml version="1.0" encoding="UTF-8"?>
                <products> 
                <product id="3001">
                <name>Party zip pump</name>
                <brand>Fashion by C</brand>    
                <description><![CDATA[Haka på trenden med dragkedja med denna coola pump!<br /><br /> <b>Material:</b><br />Italienskt läder. Dragkedja längst hela klacken. 11 cm klack, inklädd i läder. Insidan och sulan i läder.]]> <![CDATA[]]></description>
                <price currency="SEK">1,299</price>
                <images>
                    <image small="http://www.fashionbyc.com/product/M1thumb1_3001.png" medium="http://www.fashionbyc.com/product/Mthumb1_3001.png" large="http://www.fashionbyc.com/product/1_3001.png"/>
                    <image small="http://www.fashionbyc.com/product/M1thumb2_3001.png" medium="http://www.fashionbyc.com/product/Mthumb2_3001.png" large="http://www.fashionbyc.com/product/2_3001.png"/>
                </images>
                <categories>
                    <category>145</category>
                </categories>
                <productUrl>http://www.adsettings.com/scripts/reg_priceclick.php?pid=21736&amp;aid=479&amp;url=http://shop.fashionbyc.com/?wdCategory=3&amp;wdProduct=3001</productUrl>
                </product>
                </products>';

        $this->adsettings = new Adsettings($feed);

        $products = $this->adsettings->getProducts();
        $this->product = $products[0];
    }

    public function testProductTexts()
    {
        $this->assertEquals('Party zip pump', $this->product->getName());
        $description = 'Haka på trenden med dragkedja med denna coola pump!<br /><br /> <b>Material:</b><br />Italienskt läder. Dragkedja längst hela klacken. 11 cm klack, inklädd i läder. Insidan och sulan i läder.';
        $this->assertEquals($description, $this->product->getDescription());
    }


    public function testProductPrice()
    {
        $this->assertEquals(1299, $this->product->getPrice());
    }

    public function testProductUrl()
    {
        $this->assertEquals('http://www.adsettings.com/scripts/reg_priceclick.php?pid=21736&aid=479&url=http://shop.fashionbyc.com/?wdCategory=3&wdProduct=3001', $this->product->getTrackingUrl());
        $this->assertEquals('http://shop.fashionbyc.com/?wdCategory=3&wdProduct=3001', $this->product->getProductUrl());
    }

    public function testGraphicUrl()
    {
        $this->assertEquals('http://www.fashionbyc.com/product/1_3001.png', $this->product->getGraphicUrl());
    }

}