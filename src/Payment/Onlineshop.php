<?php
namespace TestApp\Payment;

class Onlineshop 
{
    public function charge (Payment $payment) {
        $response = $payment->authorize();
        if ($response == 'CONFIRMED') {
            return true;
        }
        return false;
    }

}