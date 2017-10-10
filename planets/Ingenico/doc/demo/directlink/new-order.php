<?php


use Ingenico\Handler\IngenicoHandler;


/**
 * This is a kamille framework init.
 * If you use another framework, use your framework init.
 * The main goal is to prepare the autoloader.
 */
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


ini_set("display_errors", "1");


$visaTestCard = "4556502807910141";
$visaTestCard = "4111111111111111"; // https://payment-services.ingenico.com/fr/fr/ogone/support/guides/integration%20guides/split-credit-debit-cards

$h = IngenicoHandler::createByConfFile(__DIR__ . "/ingenico.conf.php"); // change the path accordingly; depends on your system
$res = $h->directLink()->orderRequest([

    /**
     * See the official documentation here:
     * https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/directlink/request-a-new%20order#requestparameters
     */
    /**
     * See my directlink-operation-codes-overview.md document for a visual explanation.
     * Basically you have two main options:
     *
     * - RES: to make an authorization only.
     *          The money is not captured by your acquirer (the merchant's bank),
     *          but the acquirer ensures that it will be able to capture the money later.
     *
     *          This code might be useful for instance if you have products that you ship,
     *          and you want to prepare them first, and only capture the money later (another request),
     *          when the goods are sent to the customers.
     *
     * - SAL: to make a direct sale. The transaction is done, and the bank will capture the money
     *          when it treats the transaction (usually just before it closes at 04pm every day).
     *          When the transaction is treated, the money goes to your bank account with a delay
     *          of 24/48h (usually).
     *
     *          This mode is useful for instance if you sell small goods that don't need any preparation,
     *          like for instance concert tickets.
     *
     *
     *
     */
    'OPERATION' => 'SAL',
    //
    'ORDERID' => 'REF_' . date("Y-m-d H:i:s"),
    'AMOUNT' => '100', // 1 €
    'CURRENCY' => 'EUR',

    // credit card info
    'CARDNO' => $visaTestCard,
    'ED' => '09/2018',
    'CVC' => '123',
    // optional card info
    'CN' => 'Michel',
    'EMAIL' => 'michel@gmail.com',

    /**
     * If you want to memorize the card as a re-usable alias for later on,
     * just uncomment the following fields
     */
//    "ALIAS" => "ma-" . rand(1, 1000000),


], true);


if (true === $res->isSuccess()) {
    a("ok");
    a($res->getStatus());
    a($res->getValues());

} else {
    a("oops");
    $res->getErrorCode();
    a($res->getValues());
}