<?php
class LogAnalyzer
{
    public function IsValidLogFileName(string $fileName): bool
    {
        if(!str_ends_with($fileName, ".SLF"))
        {
            return false;
        }
        return true;
    }
}