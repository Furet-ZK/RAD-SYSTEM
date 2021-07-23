<?php

  // Paytm merchant credentials

  define('PAYTM_MERCHANT_MID',     'your_merchant_id');		// test merchant ID: amitgo59443067266036
  define('PAYTM_MERCHANT_KEY',     'your_merchant_key');	// test merchant key: bQfzzkKzeCbR7jOl
  define('PAYTM_MERCHANT_WEBSITE', 'your_website_name');	// test website name: WEBSTAGING
  define('PAYTM_INDUSTRY_TYPE_ID', 'Retail');
  define('PAYTM_CHANNELID',        'WEB');

  // test or live mode

  define('PAYTM_TEST_MODE', TRUE);

  // default URLs

  define('PAYTM_URL_TEST',   'https://securegw-stage.paytm.in/theia/processTransaction');
  define('PAYTM_URL_LIVE',   'https://securegw.paytm.in/theia/processTransaction');
  define('PAYTM_RETURN_URL', 'paytm_return.php');

  // other

  define('PAYTM_CUSTID_IAS', 'IAS');	// user name used in IAS orders; space character cannot be used
?>
