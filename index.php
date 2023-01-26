<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Chatbot</title>
</head>
<body>
    <div class="box">
    <form action="" method="post">
        <h1>Welcome to the chatbot!</h1>
        <label for="subcategory">Please select a subcategory:</label>
        <select id="subcategory" name="subcategory">
            <option value="bestellingen">Bestellingen</option>
            <option value="leveringen">Leveringen</option>
            <option value="contact"><a href="contactform.php">Contact</a></option>
        </select>
        <br><br>
        <div id="bestelnummer-section" style="display: none;">
            <label for="bestelnummer">Please enter your bestelnummer:</label>
            <input type="text" id="bestelnummer" name="bestelnummer">
        </div>
        <br><br>
        <input type="submit" value="Submit">

        <div id="contact-section" style="display: none;">
        </div>
    </div>
    </form>
    <br>
    <p id="response"></p>
    <script>
        document.getElementById("subcategory").onchange = function() {
            if (this.value === "bestellingen") {
                document.getElementById("bestelnummer-section").style.display = "block";
            } else {
                document.getElementById("bestelnummer-section").style.display = "none";
            }
            if (this.value === "contact") {
                document.getElementById("bestelnummer-section").style.display = "block";
            } else {
                document.getElementById("bestelnummer-section").style.display = "none";
            }
        }
    </script>
<?php
    session_start();
    if (!isset($_SESSION['bestellingnummer'])) {
        $_SESSION['bestellingnummer'] = 0;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $subcategory = $_POST["subcategory"];
        if ($subcategory === "bestellingen") {
            $bestelnummer = $_POST["bestelnummer"];
            if (is_numeric($bestelnummer) && (int) $bestelnummer == $bestelnummer) {
                $_SESSION['bestellingnummer'] = $bestelnummer;
                echo "<script>document.getElementById('response').innerHTML = 'Thank you for your order. Your bestelnummer is " . $bestelnummer . " and it contains product 1.';</script>";
            } else {
                echo "<script>document.getElementById('response').innerHTML = 'Invalid bestelnummer. Please enter a valid integer.';</script>";
            }
        }
    }
?>

</body>
</html>