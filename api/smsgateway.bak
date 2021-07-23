<?php
/*****************************************************************************
**        Name: sendsms
**    Function: This function is used to send SMS message to a mobile phone.
**		The default implementation uses clickatell.com HTTP->SMS gateway.
**		You can implement your own SMS gateway in this function easily.
**		This is the new style clickatell API glue code
**      Inputs: $recp - Mobile number
**		$body - Message body
**		$errmsg - Pointer to error message returned by the gateway
**      Result: TRUE if API succeeded or FALSE
*****************************************************************************/
function sendsms($recp, $body, &$errmsg)
{
  // enter your clickatell.com credentials here

  $api_key = "clickatell_api_key";

  // clean up HTML entities

  $body = html_entity_decode($body, ENT_COMPAT, "UTF-8");

  // uncomment the following lines to see the SMS details

//  print $recp . "<br>";
//  print $body . "<br>";
//  return true;

  // no recipient set, return FALSE
  if (!$recp)
  {
    $errmsg = "Invalid cell number";
    return FALSE;
  }

  // implement your own SMS gateway here
  
  $body = rawurlencode($body);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://platform.clickatell.com/messages/http/send?apiKey=$api_key&to=$recp&content=$body");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  $res = curl_exec($ch);
  curl_close($ch);

  // uncomment the following line to see the result from the SMS gateway

//  print $res;

  // process results
  if (strpos($res, "accepted") )
    $res_str = "OK";
  else
    $res_str = $res;

  // log results
  syslog(LOG_INFO, "[radiusmanager] Sending SMS to " . $recp . " (" . $res_str . ")");

  // error has occured, return FALSE
  if ($res_str != "OK")
  {
    $errmsg = $res_str;
    return FALSE;
  }

  // no error, return TRUE
  return TRUE;
}
?>
