<?php
// custom function
function wpphLog($message, $data=null, $function=null,$line=null){ WPPHLogger::write($message,$data,$function,$line); }
/*
 * @internal
 * Debug class
 * DO NOT enable this on live website
 */
class WPPHLogger
{
    private static $_debugLoggingEnabled = false;

    private static $_fileName = 'debug.log';

    public static function enableDebugLogging(){ self::$_debugLoggingEnabled = true; }
    public static function enableErrorLogging(){ ini_set('error_log', WPPH_PLUGIN_DIR.'error.log'); }

    public static function write($message, $data=null, $function=null, $line=null)
    {
        if(!empty($_POST)){
            if(isset($_POST['action']) && $_POST['action'] == 'heartbeat'){ return;}
        }

        if(!self::$_debugLoggingEnabled) { return; }

        $m = '['.@date("D, M d, Y @H:i:s").'] Debug: '.$message;
        if(!empty($function)){
            $m .= PHP_EOL.'Function: '.$function;
            if(! empty($line)){
                $m .= PHP_EOL.'Line: '.$line.PHP_EOL;
            }
        }
        if(! empty($data)) {
            $m .= ' Data: '.var_export($data, true);
        }
        $m .= PHP_EOL;

        @file_put_contents(WPPH_PLUGIN_DIR.self::$_fileName,$m,FILE_APPEND);
    }
}