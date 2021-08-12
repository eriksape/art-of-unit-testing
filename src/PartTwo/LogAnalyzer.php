<?php

namespace src\PartTwo;

class LogAnalyzer
{
    public IExtensionManager $manager;
    private ?IWebService $service;

    public function __construct(IWebService $service = null)
    {
        $this->manager = ExtensionManagerFactory::Create();
        $this->service = $service;
    }

    public function IsValidLogFileName(string $fileName): bool
    {
        return $this->manager->IsValid($fileName) && strlen(pathinfo($fileName, PATHINFO_FILENAME)) > 5;
    }

    public function Analyze(string $filename): void
    {
        if(strlen($filename) < 8)
        {
            $this->service->LogError("Filename too short: $filename");
        }
    }

}