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

    /**
     * @dataProvider filesToValidate
     */
    public function test_IsValidLogFileName_ValidExtensions_ReturnsTrue($filename): void
    {
        $analyzer = new LogAnalyzer();
        $result = $analyzer->IsValidLogFileName($filename);
        $this->assertTrue($result);
    }

    public function filesToValidate(): array
    {
        return [
            ['filewithgoodextension.slf'],
            ['filewithgoodextension.SLF']
        ];
    }
}