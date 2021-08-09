<?php

namespace src\PartTwo;

interface IExtensionManager
{
    public function IsValid(string $filename): bool;
}