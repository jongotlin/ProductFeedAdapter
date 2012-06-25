<?php

namespace ProductFeedAdapter\Test;

use ProductFeedAdapter\Network\NetworkFactory;
use ProductFeedAdapter\Network\Adrecord;

class FactoryTest extends \PHPUnit_Framework_TestCase
{

    private $adrecordStrumpgalen = '{
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


    private $tradedoublerSpelbutiken = '
<?xml version="1.0" encoding="UTF-8"?>
<products>
    <product>
        <name>Call of Duty: Modern Warfare 3 /X360</name>
        <productUrl>
            http://pdt.tradedoubler.com/click?a(2122225)p(77609)prod(1016720533)ttid(5)url(http%3A%2F%2Fwww.spelbutiken.se%2Fcatalog%2Fproduct%2F68837-call-of-duty--modern-warfare-3--for-x360)
        </productUrl>
        <imageUrl>
            http://www.spelbutiken.se/catalog/product_thumb.php?w=150&img=images/boxshots/68837-forside.jpg
        </imageUrl>
        <description>
            Call of Duty: Modern Warfare 3 - Utvecklat av Infinity Ward och Sledgehammer Games; Modern Warfare 3 utspelar sig i en värld på randen till undergång, där Makarov och hans terror-organisation sprider kaos och ödeläggelse över hela planeten. Spelaren tar sig an flera roller och spelar som medlemmar från olika specialstyrkor, alla utrustade med de mest avancerade vapen som finns. I samarbete med Delta-operatörer och välkända karaktärer ger sig spelaren ut på en livsfarlig, världsomspännande katt-och-råtta-lek för att stoppa en galning innan det är för sent. Modern Warfare 3 vidareutvecklar Modern Warfares välkända 60fps-teknologi för att leverera en adrenalinpumpande actionupplevelse i Single Player, Special Ops och Online Multiplayer. Spelet börjar precis efter Modern Warfare 2 slutar, och utspelar sig över hela världen när du iklär dig olika roller som en rysk säkerhetsagent, SAS-soldat, tank förare och AC-130 skytt såväl som karaktärer från tidigare spel. Spelet innehåller 15 uppdrag och börjar när Manhattan invaderas av ryska soldater.Självklart så finns en stor multiplayer-del, med mängder av banor och även två spellägen: \'\'Survival\'\' och \'\'Mission\'\'.###SEARCH#call of duty x360###&nbsp;Plattform:XboxGenre: FPSSpr&aring;k i spelet: Spr&aring;k p&aring; f&ouml;rpackning: E3 2011 - CoD: Modern Warfare 3Call Of Duty: Modern Warfare 3 - Teaser trailerCall Of Duty: Modern Warfare 3 - Reveal trailer
        </description>
        <price>348.00</price>
        <currency>SEK</currency>
        <TDProductId>1016720533</TDProductId>
        <TDCategoryID>101</TDCategoryID>
        <TDCategoryName>Spel och leksaker</TDCategoryName>
        <merchantCategoryName>Xbox 360</merchantCategoryName>
        <sku/>
        <shortDescription>
            Call of Duty: Modern Warfare 3 - Utvecklat av Infinity Ward och Sledgehammer Games; Modern Warfare 3 utspelar sig i en värld på randen till undergång, där Makarov och hans terror-organisation sprider
        </shortDescription>
        <promoText/>
        <previousPrice/>
        <warranty/>
        <availability>Now</availability>
        <inStock/>
        <shippingCost/>
        <deliveryTime>1-3 dage</deliveryTime>
        <weight>90.00</weight>
        <size/>
        <brand/>
        <model/>
        <ean>5030917096853</ean>
        <upc/>
        <isbn/>
        <condition/>
        <mpn/>
        <techSpecs/>
        <manufacturer/>
        <programName>Spelbutiken</programName>
        <programLogoPath>
            http://hst.tradedoubler.com/file/77609/logo/spelbutiken-logo-100x100.jpg
        </programLogoPath>
        <programId>77609</programId>
        <advertiserProductUrl>
            http://www.spelbutiken.se/catalog/product/68837-call-of-duty--modern-warfare-3--for-x360
        </advertiserProductUrl>
        <fields/>
    </product>
</products>';


    private $adtractionBoardstore = '<?xml version="1.0" encoding="UTF-8"?>
<productFeed
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:noNamespaceSchemaLocation="http://www.adtraction.com/schemas/productfeedschema.xsd">
  <product>
    <SKU>48343</SKU>
    <Name>DC Grande Premium Zip Hood</Name>
    <Description>Härlig Zip Hood från DC. Magficka, och metall logga på bröstet.

80% Bomull
20% Polyester
Tvätt: 30 grader

Modellen är 181 och fotograferad i Large.</Description>
    <Category>Tröjor  -  Zip Hoods</Category>
    <Price>699</Price>
    <Shipping>49</Shipping>
    <Currency>SEK</Currency>
    <Instock>yes</Instock>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
    <Brand>DC</Brand>
  </product>
</productFeed>';


    private $zanoxLaredoute = '<?xml version="1.0" encoding="utf-8"?>
<products xmlns="http://zanox.com/productdata/exportservice/v1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://zanox.com/productdata/exportservice/v1 http://productdata.zanox.com/exportservice/schema/export-1.0.xsd">
    <product zupid="66e584ec396cb80ef1ce9b275e5f6aa8">
        <name>Bälte</name>
        <program>3633</program>
        <number>www.laredoute.se/d/Accessoarer-Balten-skarp/ActiveWear/_/N-1z141</number>
        <description>Skinn med effekt av två material. Spänne och nitar i patinerad metall. Bredd 3,8 cm. Midjemått i cm.</description>
        <manufacturer>Active Wear</manufacturer>
        <price>226.85</price>
        <oldPrice>349.00</oldPrice>
        <shippingHandling>10 juni</shippingHandling>
        <shippingHandlingCost>44.90</shippingHandlingCost>
        <lastModified>2012-05-23T08:38:00</lastModified>
        <smallImage>http://media.redcatsnordic.com/images/products/thumb_lr/32421/324219343-a8b7bc8f-3caf-45a9-8e15-f41018a3c3da.jpg</smallImage>
        <mediumImage>http://media.redcatsnordic.com/images/products/push_large_lr/32421/324219343-a8b7bc8f-3caf-45a9-8e15-f41018a3c3da.jpg</mediumImage>
        <largeImage>http://media.redcatsnordic.com/images/products/normal_lr/32421/324219343-a8b7bc8f-3caf-45a9-8e15-f41018a3c3da.jpg</largeImage>
        <currencyCode>SEK</currencyCode>
        <extra1>På lager</extra1>
        <extra2>Herr</extra2>
        <extra3>Brun</extra3>
        <merchantCategory>Accessoarer / Bälten &amp; skärp</merchantCategory>
        <deepLink>http://ad.zanox.com/ppc/?13691138C1760332445&amp;ULP=[[Accessoarer-Balten-skarp/ActiveWear/_/N-1z141ptZ1z1414w?Nr=327682]]</deepLink>
    </product>
</products>';

    public function testFeedIsAnAdrecordFeed()
    {
        $network = NetworkFactory::getNetwork($this->adrecordStrumpgalen);

        $this->assertInstanceOf('ProductFeedAdapter\Network\Adrecord', $network);
     }

    public function testFeedIsATradeDoublerFeed()
    {
        $network = NetworkFactory::getNetwork($this->tradedoublerSpelbutiken);

        $this->assertInstanceOf('ProductFeedAdapter\Network\TradeDoubler', $network);
     }

    public function testFeedIsAnAdTractionFeed()
    {
        $network = NetworkFactory::getNetwork($this->adtractionBoardstore);

        $this->assertInstanceOf('ProductFeedAdapter\Network\AdTraction', $network);
    }

    public function testFeedIsAZanoxFeed()
    {
        $network = NetworkFactory::getNetwork($this->zanoxLaredoute);

        $this->assertInstanceOf('ProductFeedAdapter\Network\Zanox', $network);
    }

    /**
     * @expectedException ProductFeedAdapter\Network\Exception\NetworkNotFoundException
     */
    public function testNoNetworkFoundForUnknownFeed()
    {
        $network = NetworkFactory::getNetwork('{"foo": "bar"}');
    }

    /**
     * @expectedException ProductFeedAdapter\Network\Exception\FeedIsEmptyException
     */
    public function testNoNetworkFoundForEmptyFeed()
    {
        $network = NetworkFactory::getNetwork('');
    }

    /**
     * @expectedException ProductFeedAdapter\Network\Exception\FeedIsEmptyException
     */
    public function testNoNetworkFoundForNullFeed()
    {
        $network = NetworkFactory::getNetwork(null);
    }
}
