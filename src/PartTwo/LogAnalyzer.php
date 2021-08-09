<?php

namespace src\PartTwo;

class LogAnalyzer
{
    public IExtensionManager $manager;
    public function __construct()
    {
        $this->manager = ExtensionManagerFactory::Create();
    }

    public function IsValidLogFileName(string $fileName): bool
    {
        return $this->manager->IsValid($fileName) && strlen(pathinfo($fileName, PATHINFO_FILENAME)) > 5;
    }

}