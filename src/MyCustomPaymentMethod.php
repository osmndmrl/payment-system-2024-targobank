<?php

namespace MyCustomPayment\Methods;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;
use Plenty\Plugin\Log\Loggable;

class MyCustomPaymentMethod extends PaymentMethodService
{
    use Loggable;

    public function isSwitchableTo($orderId = null): bool
    {
        // Check if payment method can be used for the order
        return true;
    }

    public function isBackendSearchable(): bool
    {
        return true;
    }
}
