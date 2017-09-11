<html>
<head>
<title>Thanks For Contacting Me</title>
</head>
<body>
<?php
  // Change this to YOUR address
  $recipient = 'greensparkles808@gmail.com';
  $email = $_POST['email'];
  $realName = $_POST['realname'];
  $body = $_POST['body'];
  $messages = array();
# Fake email filter chars
if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
$messages[] = "That is not a valid email address.";
}
# Fake name filter chars
if (!preg_match("/^[\w\ \+\-\'\"]+$/", $realName)) {
$messages[] = "The real name field must contain only " .
"alphabetical characters, numbers, spaces, and " .
"reasonable punctuation. We apologize for any inconvenience.";
}
# Line break check
$subject = preg_replace('/\s+/', ' ', $subject);
# Blank sub check
if (preg_match('/^\s*$/', $subject)) {
$messages[] = "Please specify a subject for your message.";
}

$body = $_POST['body'];
# Make sure the message has a body
if (preg_match('/^\s*$/', $body)) {
$messages[] = "Your message was blank. Did you mean to say " .
"something?"; 
}
  if (count($messages)) {
    # There were problems, so tell the user and
    # don't send the message yet
    foreach ($messages as $message) {
      echo("<p>$message</p>\n");
    }
    echo("<p>Click the back button and correct the problems. " .
      "Then click Send Your Message again.</p>");
  } else {
    # Send the email - we're done
mail($recipient,
      $subject,
      $body,
      "From: $realName <$email>\r\n" .
      "Reply-To: $realName <$email>\r\n"); 
    echo("<p>Your message has been sent. Thank you!</p>\n");
  }
?>
</body>
</html>
