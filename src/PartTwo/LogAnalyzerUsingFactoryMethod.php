<?php

namespace src\PartTwo;

class LogAnalyzerUsingFactoryMethod
{
    public function IsValidLogFileName(string $filename): bool
    {
        //return $this->GetManager()->IsValid($filename);
        return $this->IsValid($filename);
    }

    protected function GetManager(): IExtensionManager
    {
        return new FileExtensionManager();
    }

    protected function IsValid(string $filename)
    {
        $mgr = new FileExtensionManager();
        return $mgr->IsValid($filename);
    }
}