<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Formulier</title>
    <link rel="stylesheet" href="style.css">

<!-- creating variables for Message output -->
<?php

if(isset($_POST['submit'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$from = $_POST['email'];
$to = "otakinnboi@gmail.com";
$subject = "Contact formulier verzending";
$message = $firstname . " " . $lastname . " wrote the following:" . "\n\n" . $_POST['message'];

$headers = "From:" . $from;
mail($to,$subject,$message,$headers); 
echo "Mail Sent. Thank you " . $firstname . ", we will contact you shortly."; ini_set("smtp_port","25");
}
?>

<Form method="POST">

    <input type="text" name="firstname" placeholder="Voornaam"> <br>

    <input type="text" name="lastname" placeholder="Achternaam"> <br>

    <input type="text" name="email" placeholder="E-mail"> <br>

    <input type="text" name="message" label="Schrijf hier uw bericht" class="ContactMessageField"> <br>

    <input type="submit" placeholder="Versturen" name="submit">

</form>



</head>
<body>
    
</body>
</html>