<?php
// connecting to database
$conn = mysqli_connect("localhost", "root", "", "chatbot") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT answer FROM chat WHERE question LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['answer'];
    echo $replay;
}else{
    echo "Sorry, ik begrijp het even niet! u kunt een E-mail sturen naar de klantenservice hier naast";
    mysqli_query($conn, "INSERT INTO errors (messages) VALUES ('$getMesg')");
}

?>