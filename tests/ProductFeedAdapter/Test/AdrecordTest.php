<?php

namespace ProductFeedAdapter\Test;

use ProductFeedAdapter\Network\NetworkFactory;
use ProductFeedAdapter\Network\Adrecord;
use ProductFeedAdapter\Product;

class AdrecordTest extends \PHPUnit_Framework_TestCase
{

    private $adrecord;
    private $product;
    private $adrecordWithDummyFeed;

    public function setUp()
    {
        $adrecordStrumpgalen = '{
                "total": 1,
                "products": [
                    {
                        "name": "John Henric - Plain röda herrstrumpor (39-42)",
                        "categories": [
                            "Avdelningar, Herrstrumpor"
                        ],
                        "SKU": "",
                        "EAN": "",
                        "description": "Röda stiliga herrstrumpor som fungerar utmärkt både till kostym och jeans. Tillverkade i en skön kvalitet och i en alldeles perfekt tjocklek.Tillverkare: John HenricTvättråd: Maskintvätt 40 graderMaterial: 75% bomull, 20% Polyamid, 5% Lycra",
                        "model": "",
                        "brand": "",
                        "gender": "",
                        "price": "49.00",
                        "regularPrice": "49.00",
                        "shippingPrice": "",
                        "currency": "SEK",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg",
                        "inStock": "",
                        "inStockQty": "",
                        "deliveryTime": ""
                    }
                ]
            }';

        $this->adrecord = new Adrecord($adrecordStrumpgalen);

        $products = $this->adrecord->getProducts();
        $this->product = $products[0];



        $dummyFeed = '{
                "total": 12,
                "products": [
                    {
                        "name": "Produkt 1",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 2",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 3",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 4",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 5",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 6",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 7",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 8",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 9",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 10",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 11",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    },
                    {
                        "name": "Produkt 12",
                        "description": "Foo",
                        "price": "10.00",
                        "productUrl": "http://click.adrecord.com/?p=87&amp;c=9523&amp;url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-",
                        "graphicUrl": "http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg"
                    }
                ]
            }';

        $this->adrecordWithDummyFeed = new Adrecord($dummyFeed);
    }

    public function testProductTexts()
    {

        $this->assertEquals('John Henric - Plain röda herrstrumpor (39-42)', $this->product->getName());
        $this->assertEquals('Röda stiliga herrstrumpor som fungerar utmärkt både till kostym och jeans. Tillverkade i en skön kvalitet och i en alldeles perfekt tjocklek.Tillverkare: John HenricTvättråd: Maskintvätt 40 graderMaterial: 75% bomull, 20% Polyamid, 5% Lycra', $this->product->getDescription());
    }

    public function testProductPrice()
    {
        $this->assertEquals(49, $this->product->getPrice());
    }

    public function testProductUrl()
    {
        $this->assertEquals('http://click.adrecord.com/?p=87&c=9523&epi=&url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-', $this->product->getTrackingUrl());
        $this->assertEquals('http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-', $this->product->getProductUrl());
    }

    public function testEpi()
    {
        $epi = 'Myepi';
        $this->assertEquals('http://click.adrecord.com/?p=87&c=9523&epi='.$epi.'&url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-', $this->product->getTrackingUrl($epi));
    }

    public function testEpiWithUrlEncoding()
    {
        $epi = 'My epi';
        $this->assertEquals('http://click.adrecord.com/?p=87&c=9523&epi='.urlencode($epi).'&url=http://www.strumpgalen.se/herrstrumpor/john-henric-plain-roda-herrstrumpor-', $this->product->getTrackingUrl($epi));
    }

    public function testGraphicUrl()
    {
        $this->assertEquals('http://www.strumpgalen.se/images/126289/310x310/john-henric-herrstrumpor-plain-rod.jpg', $this->product->getGraphicUrl());
    }

    public function testGetAllProducts()
    {
        $products = $this->adrecordWithDummyFeed->getProducts();
        $this->assertEquals(12, $products->count());

        $products = $this->adrecordWithDummyFeed->getProducts(0);
        $this->assertEquals(12, $products->count());

        $products = $this->adrecordWithDummyFeed->getProducts(0, 12);
        $this->assertEquals(12, $products->count());
    }

    public function testGetSelectedProducts()
    {
        $products = $this->adrecordWithDummyFeed->getProducts(0,1);
        $this->assertEquals(2, $products->count());
        $this->assertEquals('Produkt 1', $products[0]->getName());
        $this->assertEquals('Produkt 2', $products[1]->getName());

        $products = $this->adrecordWithDummyFeed->getProducts(3,5);
        $this->assertEquals(3, $products->count());
        $this->assertEquals('Produkt 4', $products[0]->getName());
        $this->assertEquals('Produkt 5', $products[1]->getName());
        $this->assertEquals('Produkt 6', $products[2]->getName());

    }

}