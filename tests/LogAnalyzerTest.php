<?php
use PHPUnit\Framework\TestCase;

class LogAnalyzerTest extends TestCase
{
    private ?LogAnalyzer $analyzer = null;

    protected function setUp(): void
    {
        $this->analyzer = new LogAnalyzer();
    }

    /**
     * @group goodTest
     * @dataProvider filesToValidate
     */
    public function test_IsValidLogFileName_VariousExtensions_ChecksThem(string $filename, bool $expected): void
    {
        $result = $this->analyzer->IsValidLogFileName($filename);
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

    /**
     * @group goodTest
     */
    public function test_IsValidFileName_EmptyFileName_ThrowsException():void
    {
        $this->expectExceptionMessage("filename has to be provided");
        $this->analyzer->IsValidLogFileName("");
    }

    /**
     * @group testSkipped
     */
    public function test_IsAboutNewThing():void
    {
        $this->markTestSkipped("not implemented yet.");
    }

    /**
     * @group goodTest
     * @dataProvider filesToValidate
     */
    public function test_IsValidFileName_WhenCalled_ChangesWasLastFileNameValid(string $filename, bool $expected):void
    {
        $this->analyzer->IsValidLogFileName($filename);
        $this->assertEquals($expected, $this->analyzer->wasLastFileValid);
    }

    protected function tearDown(): void
    {
        //the line below is included to show an anti pattern.
        //This isn’t really needed. Don’t do it in real life.
        $this->analyzer = null;
    }
}