<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Input extends CI_Input {
    function _clean_input_keys($str) {
        // UPDATE: Now includes comprehensive Regex that can process escaped JSON
        if (!preg_match("/^[a-z0-9\:\;\.\,\?\!\@\#\$%\^\*\"\~\'+=\\\ &_\/\.\[\]-\}\{]+$/iu", $str)) {
            /**
             * Check for Development enviroment - Non-descriptive 
             * error so show me the string that caused the problem 
             */
            if (getenv('ENVIRONMENT') && getenv('ENVIRONMENT') == 'DEVELOPMENT') {
                var_dump($str);
            }
            exit('Disallowed Key Characters.');
        }
        
        // Clean UTF-8 if supported
        if (UTF8_ENABLED === TRUE) {
            $str = $this->uni->clean_string($str);
        }

        return $str;
    }
}