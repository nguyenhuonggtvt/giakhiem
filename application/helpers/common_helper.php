<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   function dot_so($string){
       $result="";
       $string=strrev($string);
       $a=str_split($string,3);
       foreach($a as $chuoi){
          $result.=$chuoi.".";
           }
           $result=strrev($result);
           $result=substr($result,1,strlen($result));
           return $result;
    }

    function getBrowser() {
        
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version = "";

        //  if the reuqest is sent from terminal(eg: facebook share reques) return dummy data
        if(empty($_SERVER['HTTP_USER_AGENT'])){
            return array(
                'userAgent' => $bname,
                'name' => $bname,
                'version' => $version,
                'platform' => $platform,
                'pattern' => 'test',
                'device' => 'Computer'
            );
        }
        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason

        if (preg_match('/YaBrowser/', $u_agent)) {
            $bname = 'Ya Browser';
            $ub = "YaBrowser";
        } elseif (preg_match('/OPR/', $u_agent)) {
            $bname = 'Opera Browser';
            $ub = "OPR";
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        } elseif (preg_match('/Chrome/i', $u_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i', $u_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        } elseif (preg_match('/Opera/i', $u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        } else {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = ($matches && $matches['version'])?$matches['version'][0]:'';
            } else {
                $version = ($matches && $matches['version'])?$matches['version'][1]:'';
            }
        } else {
            $version = $matches['version'][0];
        }

        // check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }

        $windowPhone = strripos($u_agent, "Windows Phone");
        $microsoft = strripos($u_agent, "Microsoft");
        $iPod = strripos($u_agent, "iPod");
        $iPhone = strripos($u_agent, "iPhone");
        $iPad = strripos($u_agent, "iPad");
        $Android = strripos($u_agent, "Android");
        $webOS = strripos($u_agent, "webOS");
        $device = "";
        //do something with this information
        if (($iPod || $iPhone) && !$microsoft) {
            $device = "iPhone/iPod";
        } else if ($iPad) {
            $device = "iPad";
        } else if ($Android && !$microsoft) {
            $device = "Android device";
        } else if ($webOS) {
            $device = "webOS";
        } else if ($windowPhone && $microsoft) {
            $device = "Window Phone";
        } else {
            $device = "Computer";
        }

        return array(
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern,
            'device' => $device
        );
    }