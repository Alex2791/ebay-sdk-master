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
/**
 * The namespaces provided by the SDK.
 */
use \DTS\eBaySDK\Shopping\Services;
use \DTS\eBaySDK\Shopping\Types;
use \DTS\eBaySDK\Shopping\Enums;;

echo "--------------------------------------------------------------------------------";

$service = new Services\ShoppingService(array(
    'apiVersion' => $config['shoppingApiVersion'],
    'appId' => 'KKK6bb807-2fab-408e-aea4-9b2a2a89b87'
));

/**
 * Create the request object.
 *
 * For more information about creating a request object, see:
 * http://devbay.net/sdk/guides/getting-started/#request-object
 */
$request = new Types\GetSingleItemRequestType();
/**
 * Specify the item ID of the listing.
 */
$request->ItemID = '281832802693';
/**
 * Specify that additional fields need to be returned in the response.
 */
$request->IncludeSelector = 'ItemSpecifics,Variations,Compatibility,Details,BusinessSellerDetails';
/**
 * Send the request to the GetSingleItem service operation.
 *
 * For more information about calling a service operation, see:
 * http://devbay.net/sdk/guides/getting-started/#service-operation
 */
$response = $service->getSingleItem($request);
/**
 * Output the result of calling the service operation.
 *
 * For more information about working with the service response object, see:
 * http://devbay.net/sdk/guides/getting-started/#response-object
 */
if (isset($response->Errors)) {
    foreach ($response->Errors as $error) {
        printf("%s: %s\n%s\n\n",
            $error->SeverityCode === Enums\SeverityCodeType::C_ERROR ? 'Error' : 'Warning',
            $error->ShortMessage,
            $error->LongMessage
        );
    }
}
if ($response->Ack !== 'Failure') {
    var_dump($response);
    $item = $response->Item;
    print("$item->Title\n");
    printf("Quantity sold %s, quantiy available %s\n",
        $item->Location,
        $item->QuantitySold,
        $item->Quantity - $item->QuantitySold
    );
    if (isset($item->Details)) {
       /* print("\nThis item has the following item specifics:\n\n");
        foreach($item->ItemSpecifics->NameValueList as $nameValues) {
            printf("%s: %s\n",
                $nameValues->Name,
                implode(', ', iterator_to_array($nameValues->Value))
            );

        }*/
        echo"OKKK";
    }


   // $item->BidCount;
 /*   if (isset($item->ItemSpecifics)) {
        print("\nThis item has the following item specifics:\n\n");
        foreach($item->ItemSpecifics->NameValueList as $nameValues) {
            printf("%s: %s\n",
                $nameValues->Name,
                implode(', ', iterator_to_array($nameValues->Value))
            );
        }
    }
    if (isset($item->Variations)) {
        print("\nThis item has the following variations:\n");
        foreach($item->Variations->Variation as $variation) {
            printf("\nSKU: %s\nStart Price: %s\n",
                $variation->SKU,
                $variation->StartPrice->value
            );
            printf("Quantity sold %s, quantiy available %s\n",
                $variation->SellingStatus->QuantitySold,
                $variation->Quantity - $variation->SellingStatus->QuantitySold
            );
            foreach($variation->VariationSpecifics as $specific) {
                foreach($specific->NameValueList as $nameValues) {
                    printf("%s: %s\n",
                        $nameValues->Name,
                        implode(', ', iterator_to_array($nameValues->Value))
                    );
                }
            }
        }
    }
    if (isset($item->ItemCompatibilityCount)) {
        printf("\nThis item is compatible with %s vehicles:\n\n", $item->ItemCompatibilityCount);
        // Only show the first 3.
        $limit = min($item->ItemCompatibilityCount, 3);
        for ($x = 0; $x < $limit; $x++) {
            $compatibility = $item->ItemCompatibilityList->Compatibility[$x];
            foreach($compatibility->NameValueList as $nameValues) {
                printf("%s: %s\n",
                    $nameValues->Name,
                    implode(', ', iterator_to_array($nameValues->Value))
                );
            }
            printf("Notes: %s \n", $compatibility->CompatibilityNotes);
        }
    }*/
}
