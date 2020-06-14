<?php
require_once ("stripe/init.php");

$stripe = array(
    "secret_key"      => "sk_test_51Gs4PwDEc8r9Efs1kPFReGZOYQDda2P7jnp59B7INuOrr63v3VyteFpUJeKs6GOiupJKfhwP0veYTRGVaSiNcIQm00rINX1Bvt",
    "publishable_key" => "pk_test_51Gs4PwDEc8r9Efs1O3jImjS56uOIRmku5RjTNY4euMffQMVpKIfYNJfZJsYuzpqo5sasp4X7FBwATiSDk5c47HWY00qeBvjEx6"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

