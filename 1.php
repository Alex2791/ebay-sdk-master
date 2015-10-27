<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/13/15
 * Time: 12:27 PM
 */
//require 'vendor/autoload.php';
require __DIR__.'/vendor/autoload.php';



use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Finding\Services;
use \DTS\eBaySDK\Finding\Types;


// Create the service object.
$service = new Services\FindingService([
    'appId' => 'KKK6bb807-2fab-408e-aea4-9b2a2a89b87',
    'globalId' => Constants\GlobalIds::DE
]);

// Create the request object.
//$request = new Types\FindItemsAdvancedRequest();
//$request = new Types\FindItemsByKeywordsRequest();
$request = new Types\FindItemsByCategoryRequest();
$request->categoryId = array('2613');
//$request->keywords = 'TV';
/*$request->itemFilter[] = new Types\ItemFilter(array(
    'name' => 'MaxPrice',
    'value' => array('10.00')
));*/


// Send the request to the service operation.
//$response = $service->findItemsByKeywords($request);
$response = $service->findItemsByCategory($request);
// Output the result of calling the service operation.

foreach ($response->searchResult->item as $item) {
    printf("(%s) %s: %s %.2f\n",
        $item->itemId,
        $item->location,
        $item->title,
        $item->sellingStatus->currentPrice->currencyId,
        $item->sellingStatus->currentPrice->value
    );
    echo "<img src=".$item->galleryURL."><img>";
}

