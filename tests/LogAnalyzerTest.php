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
}