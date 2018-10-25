<?php
use Magento\Framework\App\Bootstrap;
// Force Script errors.
error_reporting(E_ALL); 
ini_set('display_errors', 1);

// Todo, change path accordingly.
require __DIR__ . '/app/bootstrap.php';


$bootstrap = Bootstrap::create(BP, $_SERVER);

$obj = $bootstrap->getObjectManager();

$state = $obj->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');

$_products = $obj->get('Magento\Catalog\Model\Product')->getCollection();

foreach($_products as $_product){

    //$_product = $obj->get('Magento\Catalog\Model\Product')->load($_product->getId()); // Enable this, if you are receiving more attributes those not accessible in generic values.
    try {
        echo $_product->getName(); //  prints name.
    } catch(\Exception $e) {
        echo 'An error occured while retrieving product name.';
    }

}
