<?php
   $message = "Hello $_GET[name],\r\nHow are you? You are at branch # $_GET[branch]. \r\nOleg";

   // In case any of our lines are larger than 70 characters, we should use wordwrap()
   $message = wordwrap($message, 70, "\r\n");

   $subject = "My Subject";
   // Send
   if(!mail('$_GET[email]', $subject, $message)) {
      error_log("Mail not sent to $_GET[email]");
   } else {
      error_log("Mail sent successfully to $_GET[email]");
   }
   
?>