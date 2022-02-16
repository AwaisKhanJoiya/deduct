<?php
require('stripe-php-master/init.php');

$published_key = "pk_test_51IyFZjHStWWPulemLybZQOZI8jeIJR34XEs6NLXtORdyVpik5YXZWuQT0d23Rd1E9NmVYqqnNfP5LNJUYZN0Ngqu00e0jWpHZs";
$secret_key = "sk_test_51IyFZjHStWWPulemF2cq487ZN5qknWXUXVsICsV19PjEiI3CZiQmwYtrHrf1LM1Kw6Y7YX54WuMf2vye4iYYrchs00aJYcJVac";

\Stripe\Stripe::setApiKey($secret_key);