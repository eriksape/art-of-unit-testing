<?php
namespace PartTwo;

use PHPUnit\Framework\TestCase;
use src\PartTwo\AlwaysValidFakeExtensionManager;
use src\PartTwo\ExtensionManagerFactory;
use src\PartTwo\IExtensionManager;
use src\PartTwo\LogAnalyzer;
use Exception;

class LogAnalyzerTest extends TestCase
{
    public function test_IsValidFileName_ExtManagerThrowsException_ReturnsFalse(): void
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->WillThrow = new Exception("this is fake");
        $log = new LogAnalyzer ($myFakeManager);
        $result = $log->IsValidLogFileName("anything.anyextension");
        $this->assertFalse($result);
    }

    public function test_IsValidFileName_SupportedExtension_ReturnsTrue(): void
    {
        //set up the stub to use, make sure it returns true
        //...
        ExtensionManagerFactory::SetManager(new AlwaysValidFakeExtensionManager());
        $log = new LogAnalyzer();
        //Assert logic assuming extension is supported
        //...
        $this->assertTrue($log->IsValidLogFileName("someextension.exe"));
    }
}

class FakeExtensionManager implements IExtensionManager {
    public bool $WillBeValid = false;
    public ?Exception $WillThrow = null;
    public function IsValid(string $fileName): bool
    {
        if($this->WillThrow !=null) {
            throw $this->WillThrow;
        }
        return $this->WillBeValid;
    }
}