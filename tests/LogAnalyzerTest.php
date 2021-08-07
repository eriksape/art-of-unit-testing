<?php
declare(strict_types=1);
//namespace Tests;

use PHPUnit\Framework\TestCase;

class LogAnalyzerTest extends TestCase
{
    public function test_IsValidFileName_BadExtension_ReturnsFalse(): void
    {
        $analyzer = new LogAnalyzer();
        $result = $analyzer->IsValidLogFileName("filewithbadextension.foo");
        $this->assertNotTrue($result);
    }

    public function test_IsValidFileName_GoodExtensionLowercase_ReturnsFalse(): void
    {
        $analyzer = new LogAnalyzer();
        $result = $analyzer->IsValidLogFileName("filewithgoodextension.slf");
        $this->assertTrue($result);
    }

    public function test_IsValidFileName_GoodExtensionUppercase_ReturnsFalse(): void
    {
        $analyzer = new LogAnalyzer();
        $result = $analyzer->IsValidLogFileName("filewithgoodextension.SLF");
        $this->assertTrue($result);
    }
}