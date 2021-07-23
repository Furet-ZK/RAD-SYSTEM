<?php

  // API credentials for PayPal Express Checkout and PayPal Website Payments Pro
  
  define('API_USERNAME', "username");
  define('API_PASSWORD', "password");
  define('API_SIGNATURE', "signature");
  
  // API credentials for PayPal Website Payments Standard
  
  define("DEFAULT_USER_NAME", "username");
  define("DEFAULT_PASSWORD", "password");
  
  define("DEFAULT_EMAIL_ADDRESS", "info@mycompany.com");
  define("DEFAULT_IDENTITY_TOKEN", "token");
  
  define("DEFAULT_EWP_CERT_PATH", "certs/ewp-cert.pem");
  define("DEFAULT_EWP_PRIVATE_KEY_PATH", "certs/ewp-key.pem");
  define("DEFAULT_EWP_CERT_ID", "cert_id");
  define("PAYPAL_CERT_PATH", "certs/paypal-cert.pem");

  define("PAYPAL_RETURN_URL", "paypal_std_return.php");

  // enable sandbox test mode
 
  define("TEST_MODE", TRUE);

  // proxy
  
  define('USE_PROXY', FALSE);			// use proxy
  define('PROXY_HOST', "127.0.0.1");		// proxy host
  define('PROXY_PORT', "8080");			// proxy port
  
  // other
  
  define("LOCALECODE", "US");			// locale code for PayPal Express Checkout language
  define("CC_MERCHANT_COUNTRY", "US");		// PayPal Website Payments Pro merchant country (US / UK)
  
  // currencies supported by PayPal Website Payments Standard and Express Checkout

  $currency_paypal_std_exp = array("AUD",
  				   "CAD",
  				   "CHF",
  				   "CZK",
  				   "DKK",
  				   "EUR",
  	                   	   "GBP",
  		    	           "HKD",
  		    	           "HUF",
  		    	           "JPY",
  		    	           "NOK",
  		    	           "NZD",
  		    	           "PLN",
  		    	           "SEK",
  		    	           "SGD",
  		    	           "USD"
   		                  );
?>
