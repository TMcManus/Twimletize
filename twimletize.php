<?php
/**
 * Turns TwiML into an echo Twimlet
 *
 * @param string
 * @return string
 */
function twimletize($twiml){
    if(substr($twiml, 0, 5) == "<?xml"){
        $twiml = preg_split("/\\?\\>/u", $twiml);
        $twiml = trim($twiml[1]);
    }
    $echoUrl = "http://twimlets.com/echo?Twiml=" . urlencode($twiml);
    return $echoUrl;
}