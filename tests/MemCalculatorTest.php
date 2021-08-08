<?php
use PHPUnit\Framework\TestCase;

class MemCalculatorTest extends TestCase
{
    public function test_Sum_ByDefault_ReturnsZero():void
    {
        $calc = $this->MakeCalc();
        $lastSum = $calc->Sum();
        $this->assertEquals(0, $lastSum);
    }

    public function Add_WhenCalled_ChangesSum(): void
    {
        $calc = $this->MakeCalc();
        $calc->Add(1);
        $sum = $calc->Sum();
        $this->assertEquals(1, $sum);
    }
    private static function MakeCalc(): MemCalculator
    {
        return new MemCalculator();
    }
}