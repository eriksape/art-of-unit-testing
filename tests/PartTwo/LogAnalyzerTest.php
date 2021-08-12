<?php
namespace PartTwo;

use PHPUnit\Framework\TestCase;
use src\PartTwo\AlwaysValidFakeExtensionManager;
use src\PartTwo\ExtensionManagerFactory;
use src\PartTwo\IExtensionManager;
use src\PartTwo\IWebService;
use src\PartTwo\LogAnalyzer;
use Exception;
use src\PartTwo\LogAnalyzerUsingFactoryMethod;

class LogAnalyzerTest extends TestCase
{
    public function test_IsValidFileName_ExtManagerThrowsException_ReturnsFalse(): void
    {
        $myFakeManager = new FakeExtensionManager();
        $myFakeManager->WillThrow = new Exception("this is fake");
        //$log = new LogAnalyzer ($myFakeManager);
        $log = new LogAnalyzer ();
        $result = $log->IsValidLogFileName("anything.anyextension");
        $this->assertFalse($result);
    }

    public function test_IsValidFileName_SupportedExtension_ReturnsTrue(): void
    {
        //set up the stub to use, make sure it returns true
        //...
        $log = new LogAnalyzer();
        $log->manager = new AlwaysValidFakeExtensionManager();
        //Assert logic assuming extension is supported
        //...
        $this->assertTrue($log->IsValidLogFileName("someextension.exe"));
    }

    public function test_IsValidFileName_SupportedExtension_ReturnsTrueFactoryFake(): void
    {
        //set up the stub to use, make sure it returns true
        //...
        ExtensionManagerFactory::SetManager(new AlwaysValidFakeExtensionManager());
        $log = new LogAnalyzer();
        //Assert logic assuming extension is supported
        //...
        $this->assertTrue($log->IsValidLogFileName("someextension.exe"));
    }

    /*public function test_OverrideTest():void
    {
        $stub = new FakeExtensionManager();
        $stub->WillBeValid = true;
        $logan = new TestableLogAnalyzer($stub);
        $result = $logan->IsValidLogFileName("file.ext");
        $this->assertTrue($result);
    }*/

    public function test_OverrideTestWihoutStub():void
    {
        $logan = new TestableLogAnalyzer();
        $logan->IsSupported = true;
        $result = $logan->IsValidLogFileName("file.ext");
        $this->assertTrue($result);
    }

    public function test_Analyze_TooShortFileName_CallsWebService():void
    {
        $mockService = new FakeWebService();
        $log = new LogAnalyzer($mockService);
        $tooShortFileName = 'abc.ext';
        $log->Analyze($tooShortFileName);
        $this->assertStringContainsString('Filename too short: abc.ext', $mockService->LastError);
    }
}

class FakeExtensionManager implements IExtensionManager
{
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

class TestableLogAnalyzer extends LogAnalyzerUsingFactoryMethod
{
    /*
    public IExtensionManager $Manager;
    public function __construct(IExtensionManager $mgr)
    {
        $this->Manager = $mgr;
    }

    protected function GetManager(): IExtensionManager
    {
        return $this->Manager;
    }
    */
    public bool $IsSupported;

    protected function IsValid(string $filename)
    {
        return $this->IsSupported;
    }
}

class FakeWebService implements IWebService
{
    public string $LastError = '';

    public function LogError(string $message): void
    {
        $this->LastError = $message;
    }
}