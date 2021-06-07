<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------
// PayPalPro library configuration
// ------------------------------------------------------------------------

// PayPal environment, Sandbox or Live
$config['sandbox'] = FALSE; // FALSE for live environment

// PayPal API credentials
$config['paypal_api_username']	= 'info_api1.diamondprizes.com';
$config['paypal_api_password']	= 'NJNN2FHPK26XWYUF';
$config['paypal_api_signature'] = 'AdUjVC7PSSlFHxxy-hbqIdPyksTLASa2TTmTNJCvUmYqLMty9mUujE4A';



// PayPal business email
//$config['business'] = 'sb-nyi4i3272826@business.example.com'; // PayPal sandbox email
$config['business'] = 'info@diamondprizes.com'; // PayPal live email

// What is the default currency?
$config['paypal_lib_currency_code'] = 'GBP';

// Where is the button located at?
$config['paypal_lib_button_path'] = 'assets/images/';

// If (and where) to log ipn response in a file
$config['paypal_lib_ipn_log'] = TRUE;
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';