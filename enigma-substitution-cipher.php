<?php

// Substitution cipher key
$key = array(
  "A" => "Q",
  "B" => "W",
  "C" => "E",
  "D" => "R",
  "E" => "T",
  "F" => "Y",
  "G" => "U",
  "H" => "I",
  "I" => "O",
  "J" => "P",
  "K" => "A",
  "L" => "S",
  "M" => "D",
  "N" => "F",
  "O" => "G",
  "P" => "H",
  "Q" => "J",
  "R" => "K",
  "S" => "L",
  "T" => "Z",
  "U" => "X",
  "V" => "C",
  "W" => "V",
  "X" => "B",
  "Y" => "N",
  "Z" => "M"
);

// Encrypt a message using the substitution cipher
function encrypt($message, $key) {
  $encrypted = "";
  for ($i = 0; $i < strlen($message); $i++) {
    $char = strtoupper($message[$i]); // Convert the character to uppercase
    if (array_key_exists($char, $key)) {
      $encrypted .= $key[$char]; // Replace the character with the corresponding value from the key
    } else {
      $encrypted .= $char; // If the character is not in the key, leave it as-is
    }
  }
  return $encrypted;
}

// Decrypt a message using the substitution cipher
function decrypt($message, $key) {
  $decrypted = "";
  $key = array_flip($key); // Flip the key to make it possible to look up the original character from the encrypted character
  for ($i = 0; $i < strlen($message); $i++) {
    $char = strtoupper($message[$i]); // Convert the character to uppercase
    if (array_key_exists($char, $key)) {
      $decrypted .= $key[$char]; // Replace the character with the corresponding value from the key
    } else {
      $decrypted .= $char; // If the character is not in the key, leave it as-is
    }
  }
  return $decrypted;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Enigma Substitution Cipher</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			box-sizing: border-box;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="submit"] {
			display: block;
			margin-top: 20px;
			padding: 10px;
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		pre {
			background-color: #f5f5f5;
			padding: 20px;
			white-space: pre-wrap;
			word-wrap: break-word;
			border-radius: 5px;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Enigma Substitution Cipher</h1>
		<form method="post">
      <label for="message">Message:</label>
      <input type="text" name="message" id="message">
      <br>
      <input type="submit" name="encrypt" value="Encrypt">
      <input type="submit" name="decrypt" value="Decrypt">
    </form>
    <?php
      // Check if the form was submitted
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the message from the form
        $message = $_POST["message"];
        // Encrypt or decrypt the message based on which button was pressed
        if (isset($_POST["encrypt"])) {
          $result = encrypt($message, $key);
          $action = "Encrypted";
        } else if (isset($_POST["decrypt"])) {
          $result = decrypt($message, $key);
          $action = "Decrypted";
        }
        // Display the result
        echo "<p>$action message: $result</p>";
      }
	  
	  
    ?>
	</div>
</body>
</html>
