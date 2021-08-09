<?php

namespace src\PartTwo;

class FileExtensionManager implements IExtensionManager
{
    public function IsValid(string $filename): bool
    {
        return false;
    }
}