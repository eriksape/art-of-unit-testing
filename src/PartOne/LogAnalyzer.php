<?php
namespace src\PartOne;
use Exception;
class LogAnalyzer
{
    public bool $wasLastFileValid;

    public function IsValidLogFileName(string $fileName): bool
    {
        $this->wasLastFileValid = false;
        if (empty($fileName)) {
            throw new Exception('filename has to be provided.');
        }
        $result = str_ends_with(strtoupper($fileName), ".SLF");
        $this->wasLastFileValid = $result;
        return $result;
    }
}