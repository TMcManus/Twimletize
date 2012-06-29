<?php
/**
 * Download the Twilio PHP Helper Library from this page:
 * https://github.com/twilio/twilio-php
 *
 * After unzipping and opening the file, copy the entire 'Services' folder
 * into the same directory as this file.
 */
require_once('Services/Twilio.php');

/**
 * Using the Twilio Helper Library will require your Twilio credentials,
 * which you can find on the following page:
 * https://www.twilio.com/user/account
 */
$accountSid = 'ACXXXXXXXXX'; // Enter your own Account SID
$authToken = 'YYYYYYYYYYYY'; // Enter your own Auth Token
require_once('twimletize.php');

/**
 * The truth is I don't know how to right proper tests yet. So, uh, yeah...
 */
$test1 = "<Response><Say>This is a message for Monkey</Say></Response>";

$test2 = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><Response><Say>This is a message for Monkey</Say></Response>";

$test3 = "       <Response>
                    <Say>This is a message for You</Say>
                     <Say>This is a message for You</Say>
                     <Say>This is a message for You</Say>
                     <Say>This is a message for You</Say>
                     <Say>This is a message for You</Say>
                     <Say>This is a message for You</Say>
                   </Response>

                    ";

$test4 = new Services_Twilio_Twiml();
$test4->say('Hello');
$test4->play('https://api.twilio.com/cowbell.mp3', array("loop" => 5));

print twimletize($test4);
