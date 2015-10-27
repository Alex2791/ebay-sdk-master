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




/**
 * The namespaces provided by the SDK.
 */
use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Finding\Services;
use \DTS\eBaySDK\Finding\Types;
use \DTS\eBaySDK\Finding\Enums;

echo "--------------------------------------------------------------------------------";


// Create the service object.
$service = new Services\FindingService([
    'appId' => 'KKK6bb807-2fab-408e-aea4-9b2a2a89b87',
    'globalId' => Constants\GlobalIds::US
]);


$request = new Types\FindItemsAdvancedRequest();
$request->keywords = 'Xmas popular'
;
/**
 * Search across two categories.
 * DVDs & Movies > DVDs & Blue-ray (617)
 * Books > Fiction & Literature (171228)
 */
//$request->categoryId = array('1466');
/**
 * Filter results to only include auction items or auctions with buy it now.
 */

/**
 * Add additional filters to only include items that fall in the price range of $1 to $10.
 *
 * Notice that we can take advantage of the fact that the SDK allows object properties to be assigned via the class constructor.
 */

/**
 * Sort the results by current price.
 */
//$request->sortOrder = 'CurrentPriceHighest';
/**
 * Limit the results to 10 items per page and start at page 1.
 */
$request->paginationInput = new Types\PaginationInput();
$request->paginationInput->entriesPerPage = 200;
$request->paginationInput->pageNumber = 1;
/**
 * Send the request to the findItemsByAdvanced service operation.
 *
 * For more information about calling a service operation, see:
 * http://devbay.net/sdk/guides/getting-started/#service-operation
 */
$response = $service->findItemsAdvanced($request);
if (isset($response->errorMessage)) {
    foreach ($response->errorMessage->error as $error) {
        printf("%s: %s\n\n",
            $error->severity=== Enums\ErrorSeverity::C_ERROR ? 'Error' : 'Warning',
            $error->message
        );
    }
}
/**
 * Output the result of the search.
 *
 * For more information about working with the service response object, see:
 * http://devbay.net/sdk/guides/getting-started/#response-object
 */
printf("%s items found over %s pages.\n\n",
    $response->paginationOutput->totalEntries,
    $response->paginationOutput->totalPages
);
echo "==================\nResults for page 1\n==================\n";
/*if ($response->ack !== 'Failure') {
/// var_dump($response->BusinessSellerDetails);
  //  echo($response->BidCount);
    foreach ($response->searchResult->item as $item) {
        printf("(%s) %s: %s %.2f\n",
            $item->itemId,
            $item->country,
            $item->location,
            $item->title,
            $item->sellingStatus->currentPrice->currencyId,
            $item->sellingStatus->currentPrice->value
        );
        echo "<img src=".$item->galleryURL."><img>";
    }
}
/**
 * Paginate through 2 more pages worth of results.
 */
$count=0;
$limit = min($response->paginationOutput->totalPages, 3);
for ($pageNum = 2; $pageNum <= $limit; $pageNum++ ) {
    $request->paginationInput->pageNumber = $pageNum;
    $response = $service->findItemsAdvanced($request);
    echo "==================\nResults for page $pageNum\n==================\n";
    if ($response->ack !== 'Failure') {
        foreach ($response->searchResult->item as $item) {
           // echo $count++;
           /* if(isset($item->sellingStatus->bidCount))
            {*/
             //   echo $item->sellingStatus->bidCount;
                printf("(%s) %s: %s %.2f\n",
                    $item->itemId,
                    $item->title,
                    $item->location,
                    $item->sellingStatus->currentPrice->currencyId,
                    $item->sellingStatus->currentPrice->value
                );
                echo "<img src=".$item->galleryURL."><img>";
           // }

        }
    }
}
