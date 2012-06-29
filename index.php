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
$accountSid = 'ACXXXXXXXXXXX'; // Enter your own Account SID
$authToken = 'YYYYYYYYYYYYYY'; // Enter your own Auth Token
require_once('twimletize.php');

// The number to call from
$fromNumber = "+17075496170";

// Data to loop through. Really, any format will do.
$dataArray = array(array("to" => "+18085551234", "message" => "This is an automated call to Monkey."),
                   array("to" => "+12065554567", "message" => "Hi Owl, how is it going?"),
                   array("to" => "+19165557890", "message" => "Hey Pigeon, have fun helping your roommate move!")
                  );

// Prepare to make REST API calls to Twilio
$client = new Services_Twilio($accountSid, $authToken);

// Loop through the data and place the calls
foreach($dataArray as $item){
	// Prepare the TwiML
	$response = new Services_Twilio_Twiml();
	$response->say($item['message']);
	$message = twimletize($response); // This is where the magic happens
	// Actually make the call
    $call = $client->account->calls->create($fromNumber, $item['to'], $message);
}