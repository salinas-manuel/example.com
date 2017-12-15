<?php
//Create a RegEx pattern to determine the validity of the use submitted email
// - allow up to two strings with dot concatenation any letter, any case any number with _- before the @
// - require @
// - allow up to two strings with dot concatenation any letter, any case any number with - after the at
// - require at least 2 letters and only letters for the domain
$validEmail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";

$data = $_POST;

$errors = [];

foreach($data as $key => $value) {
    echo "{$key} = {$value}<br>";

    switch($key){
        case 'email';
            if(preg_match($validEmail, $value)!==1){
                $errors[$key] = "Invalid Email";
            }

        break;

        default:
            if(empty($value)){
                $errors[$key] = "Invalid {$key}";
            }
        break;
    }
}
var_dump($errors);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Contact Me - Manuel Salinas</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav>
            <a href="/">Home</a> |
            <a href="resume.html">Resume</a> |
            <a href="contact.php">Contact</a>
        </nav>
       <h1 id="header" class="header">Contact Manuel</h1>
       <form method="post">
           <div>
               <label for="firstName">First Name</label><br>
               <input type="text" name="first_name" id="firstName">
           </div>

           <div>
               <label for="lastName" id="lastName">Last Name</label><br>
               <input type="text" name="last_name">
           </div>

           <div>
               <label for="email" id="email">Email</label><br>
               <input type="text" name="email">
           </div>

           <div>
               <label for="subject" id="subject">Subject</label><br>
               <input type="text" name="subject">
           </div>

           <div>
               <label for="message" id="message">Message</label><br>
               <textarea name="message"></textarea>
           </div>

           <input type="submit">
       </form>
    </body>
</html>
