<?php

namespace src\PartTwo;

class AlwaysValidFakeExtensionManager implements IExtensionManager
{

    public function IsValid(string $filename): bool
    {
        return true;
    }
}