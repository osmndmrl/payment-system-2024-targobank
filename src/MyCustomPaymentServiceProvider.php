<?php

namespace MyCustomPayment;

use Plenty\Plugin\ServiceProvider;
use MyCustomPayment\Methods\MyCustomPaymentMethod;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class MyCustomPaymentServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register payment method
        $this->getApplication()->register(MyCustomPaymentMethod::class);
    }

    public function boot()
    {
        // Additional bootstrapping
        $this->extendPaymentMethods();
        $this->registerRoutes();
    }

    private function extendPaymentMethods()
    {
        // Register the payment method
        pluginApp(PaymentMethodContainer::class)->register('my-custom-payment', MyCustomPaymentMethod::class, [
            'name' => 'TARGOBANK Financing',
            'description' => 'TARGOBANK financing option'
        ]);
    }

    private function registerRoutes()
    {
        // Register routes for handling payment responses
        $router = pluginApp(Router::class);
        $router->post('my-custom-payment/process', 'MyCustomPayment\Controllers\PaymentController@processPayment');
    }
}
