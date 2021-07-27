<?php
namespace TestApp\Tests\Unit;
use PHPUnit\Framework\TestCase;
use TestApp\Payment\Payment;
use TestApp\Payment\Onlineshop;

class PaymentTest extends TestCase 
{
    public function testChargeConfirmed() {
        $payment = $this->getMockBuilder(Payment::class)
                        ->setMethods(['authorize'])
                        ->getMock();

        $payment->expects($this->once())
                ->method('authorize')
                ->will($this->returnValue('CONFIRMED'));
        
        $shop = new Onlineshop();
        $response = $shop->charge($payment);
        $this->assertTrue($response);
    }

    public function testChargeNotConfirmed() {
        $payment = $this->getMockBuilder(Payment::class)
                        ->setMethods(['authorize'])
                        ->getMock();

        $payment->expects($this->once())
                ->method('authorize')
                ->will($this->returnValue('CONFIRMEDs'));
        
        $shop = new Onlineshop();
        $response = $shop->charge($payment);
        $this->assertFalse($response);
    }

    public function testAuthorize() {
        $payment = new Payment();
        $this->assertEquals('CONFIRMED', $payment->authorize());
    }

}

