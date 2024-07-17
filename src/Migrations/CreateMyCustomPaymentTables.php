<?php

namespace MyCustomPayment\Migrations;

use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;
use Plenty\Modules\Plugin\DataBase\Blueprint;

class CreateMyCustomPaymentTables
{
    public function run(Migrate $migrate)
    {
        $migrate->createTable('MyCustomPayment', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('transaction_id');
            $table->timestamps();
        });
    }
}
