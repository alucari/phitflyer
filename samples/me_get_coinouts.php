<?php
require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require_once 'include/autoload.php';
require_once 'include/sample.inc.php';

use PhitFlyer\PhitFlyerClient;

list($api_key, $api_secret) = bitflyer_credentials();

try{
    $flyer = new PhitFlyerClient($api_key, $api_secret);

    // call web API
    $coininouts = $flyer->meGetCoinOuts(null,null,10);

    // show request URI
    $uri = $flyer->getLastRequest()->getUrl();
    echo 'URI:' . PHP_EOL;
    echo ' ' . $uri . PHP_EOL;

    // show result
    echo 'RESULT:' . PHP_EOL;
    foreach($coininouts as $idx => $item){
        echo ' [' . $idx . ']' . PHP_EOL;
        echo '  id:' . $item['id'] . PHP_EOL;
        echo '  order_id:' . $item['order_id'] . PHP_EOL;
        echo '  currency_code:' . $item['currency_code'] . PHP_EOL;
        echo '  amount:' . $item['amount'] . PHP_EOL;
        echo '  address:' . $item['address'] . PHP_EOL;
        echo '  tx_hash:' . $item['tx_hash'] . PHP_EOL;
        echo '  fee:' . $item['fee'] . PHP_EOL;
        echo '  additional_fee:' . $item['additional_fee'] . PHP_EOL;
        echo '  status:' . $item['status'] . PHP_EOL;
        echo '  event_date:' . $item['event_date'] . PHP_EOL;
    }

}
catch(\Throwable $e)
{
    print_stacktrace($e);
}
