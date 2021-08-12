<?php

namespace src\PartTwo;

interface IWebService
{
    public function LogError(string $message): void;
}