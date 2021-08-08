<?php
class LogAnalyzer
{
    public function IsValidLogFileName(string $fileName): bool
    {
        return str_ends_with(strtoupper($fileName), ".SLF");
    }
}