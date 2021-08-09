<?php

namespace src\PartTwo;

class ExtensionManagerFactory
{
    private static ?IExtensionManager $customManager = null;

    public static function Create(): IExtensionManager
    {
        if(!is_null(self::$customManager))
            return self::$customManager;
        return new FileExtensionManager();
    }

    public static function SetManager(IExtensionManager $mgr):void
    {
        self::$customManager = $mgr;
    }
}