<?php

namespace src\PartTwo;

class LogAnalyzer
{
    public IExtensionManager $manager;
    public function __construct()
    {
        $this->manager = new FileExtensionManager();
    }

    public function IsValidLogFileName(string $fileName): bool
    {
        return $this->manager->IsValid($fileName);
    }

}