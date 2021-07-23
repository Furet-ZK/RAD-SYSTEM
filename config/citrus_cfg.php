<?php

  // Citrus merchant credentials

  define('CITRUS_VANITYURL', 'url');
  define('CITRUS_SECRET',    'secret');

  // test or live mode

  define('CITRUS_TEST_MODE', TRUE);

  // default URLs

  define('CITRUS_URL_TEST',   'https://sandbox.citruspay.com');
  define('CITRUS_URL_LIVE',   'https://checkout.citruspay.com/ssl/checkout');
  define('CITRUS_RETURN_URL', 'citrus_return.php');
?>
