<?php

class SancaLogger {
    
    private static $fileHandle = null;
    private static $log_path = "";
    
    static function initalize($path) {
        
        self::$log_path = $path;
        
    }
    
    static function logMessage($stringa, $nomeUtente) {
        
        date_default_timezone_set("Europe/Rome");
        
        if (self::$fileHandle == null) {
            
            $giorno = date("d");
            $mese = date("m");
            $anno = date("Y");
            
            // prova a creare la cartella
            if (!file_exists(self::$log_path."/".$anno))
                mkdir(self::$log_path."/".$anno);
            
            self::$fileHandle = fopen(self::$log_path."/".$anno."/".$anno.$mese.$giorno.".log", "a+");
        }
        
        if (self::$fileHandle != null)
            fwrite(self::$fileHandle, "[".$nomeUtente."] - ".date("H").":".date("i").":".date("s")." - ".$stringa."\r\n");
        
    }
}

?>