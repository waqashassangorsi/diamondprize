<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Stripe API Configuration
| -------------------------------------------------------------------
|
| You will get the API keys from Developers panel of the Stripe account
| Login to Stripe account (https://dashboard.stripe.com/)
| and navigate to the Developers � API keys page
| Remember to switch to your live publishable and secret key in production!
|
|  stripe_api_key        	string   Your Stripe API Secret key.
|  stripe_publishable_key	string   Your Stripe API Publishable key.
|  stripe_currency   		string   Currency code.
*/
// $config['stripe_api_key']         = 'sk_test_51HJb1jDogdBv9fk38YI1XePSGi7a94gpjGWXcPL3tnDU1npbaqu4CKzAgnH5tvzW1EsmwIBVaZRq8GjIa8D7b5rN00Vq5g96qq'; 
// $config['stripe_publishable_key'] = 'pk_test_51HJb1jDogdBv9fk3MnYgwdBcoR7tXCoeH4tkVNSFJlOwXO53XmpwSfRI580Y3lzSZmJFQspw3MgJxE9BarTsnaNS007K092nSD'; 
$config['stripe_api_key']         = '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'; 
$config['stripe_publishable_key'] = 'pk_live_51HJb1jDogdBv9fk3758N7DrBJ4RAAV6bhRyxK364TU9zBDEA5orrOhIIzYbdjGbosQFWGWb1Ebt3A5ZXTh9MkMfo00SWNcAVF0'; 
$config['stripe_currency']        = 'GBP';