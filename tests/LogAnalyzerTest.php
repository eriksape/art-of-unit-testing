<?php
declare(strict_types=1);
//namespace Tests;

use PHPUnit\Framework\TestCase;

class LogAnalyzerTest extends TestCase
{
    /**
     * @dataProvider filesToValidate
     */
    public function test_IsValidLogFileName_VariousExtensions_ChecksThem(string $filename, bool $expected): void
    {
        $analyzer = new LogAnalyzer();
        $result = $analyzer->IsValidLogFileName($filename);
        $this->assertEquals($expected, $result);
    }

    public function filesToValidate(): array
    {
        return [
            ['filewithbadextension.foo', false],
            ['filewithgoodextension.slf', true],
            ['filewithgoodextension.SLF', true],
        ];
    }
}