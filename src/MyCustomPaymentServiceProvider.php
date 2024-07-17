<?php

namespace MyCustomPayment;

use Plenty\Plugin\ServiceProvider;

class MyCustomPaymentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(MyCustomPaymentRouteServiceProvider::class);
    }

    public function boot()
    {
        // Register the payment method
        $this->getApplication()->register(MyCustomPaymentPaymentServiceProvider::class);
    }
}
