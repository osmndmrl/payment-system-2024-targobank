<?php

namespace TargobankPayment;

use Plenty\Plugin\ServiceProvider;
use TargobankPayment\Methods\TargobankPaymentMethod;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class TargobankPaymentServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register payment method
        $this->getApplication()->register(TargobankPaymentMethod::class);
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
        pluginApp(PaymentMethodContainer::class)->register('targobank', TargobankPaymentMethod::class, [
            'name' => 'TARGOBANK Finanzierung',
            'description' => 'Zahlen Sie sicher und bequem mit TARGOBANK.'
        ]);
    }

    private function registerRoutes()
    {
        // Register routes for handling payment responses
        $router = pluginApp(Router::class);
        $router->post('targobank/process', 'TargobankPayment\Controllers\PaymentController@processPayment');
    }
}
