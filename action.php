<style>
  body {
    text-align: center;
    margin-top: 20vh;
  }
  p {
    display: block;
  }
}
</style>

<?php
  $date = date('g:ia jS F Y');
  $firstname = $_POST['firstname'];
  $email = $_POST['email'];
  
  echo "<p>Thank you ".$firstname." for ordering some bananas. Your order was placed at ".$date."</p>";
  echo "<p>A verification email was sent to ".htmlspecialchars($email).".</p>";

  print_r ($_POST);

  $outputstring = $date."\t Username: ".$username."\t Email: ".$email."\n";
  $fp = fopen("info.txt", 'ab');
  if (!$fp) {
    echo "<p>Sorry, I fucked something up.</p>";
    exit;
  }
  flock($fp, LOCK_EX);
  fwrite($fp, $outputstring, strlen($outputstring));
  flock($fp, LOCK_UN);
  fclose($fp);
  echo "<p>Information saved.</p>";
?>