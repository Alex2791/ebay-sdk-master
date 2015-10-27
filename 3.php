<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/13/15
 * Time: 12:27 PM
 */
//require 'vendor/autoload.php';
require __DIR__.'/vendor/autoload.php';
$config = require __DIR__.'/configuration.php';


use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Finding\Services;
use \DTS\eBaySDK\Finding\Types;

/*
use \DTS\eBaySDK\Shopping\Services;*/
use \DTS\eBaySDK\Shopping\Services as ShServices;
use \DTS\eBaySDK\Shopping\Types as ShTypes;

//echo "<h1>الله اكبر</h1>";


$ShService = new ShServices\ShoppingService(array(   'apiVersion' => $config['shoppingApiVersion'],
    'appId' => $config['production']['appId']));

$ShRequest = new ShTypes\GeteBayTimeRequestType();

$ShRequest = $ShService->geteBayTime($ShRequest);

if ($ShRequest->Ack !== 'Success') {
    if (isset($ShRequest->Errors)) {
        foreach ($ShRequest->Errors as $error) {
            printf("Error: %s\n", $error->ShortMessage);
        }
    }
} else {
    printf("The official eBay time is: %s\n", $ShRequest->Timestamp->format('H:i (\G\M\T) \o\n l jS F Y'));
}

echo "</br>";

echo "--------------------------------------------------------------------------------";


// Create the service object.
$service = new Services\FindingService([
    'appId' => 'KKK6bb807-2fab-408e-aea4-9b2a2a89b87',
    'globalId' => Constants\GlobalIds::US
]);

// Create the request object.
//$request = new Types\FindItemsAdvancedRequest();
$request = new Types\FindItemsByKeywordsRequest();

$request->keywords = 'TV';
$request->itemFilter[] = new Types\ItemFilter(array(
    'name' => 'MaxPrice',
    'value' => array('10.00')
));


// Send the request to the service operation.
$response = $service->findItemsByKeywords($request);


// Output the result of calling the service operation.

foreach ($response->searchResult->item as $item) {
    printf("(%s) %s: %s %.2f\n",
        $item->itemId,
        $item->title,
        $item->sellingStatus->currentPrice->currencyId,
        $item->sellingStatus->currentPrice->value
    );
}
