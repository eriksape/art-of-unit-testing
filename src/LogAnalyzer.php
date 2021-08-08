<?php
class LogAnalyzer
{
    public function IsValidLogFileName(string $fileName): bool
    {
        if(!str_ends_with(strtoupper($fileName), ".SLF"))
        {
            return false;
        }
        return true;
    }
}