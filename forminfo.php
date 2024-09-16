<?php
session_start();
// Makes an empty array if none exist yet.
if(!isset($_SESSION['users'])){
    $_SESSION['users'] = array();
}

// Checks if 'submit' button has been pressed.
if(isset($_POST["submit"])) {
    if ($_POST["submit"]) {

        // Checks if there are no empty fields
        if (empty($_POST["Gender"]) || empty($_POST["FirstName"]) || empty($_POST["LastName"]) || empty($_POST["Birthday"]) || empty($_POST["Email"]) || empty($_POST["EstimatedDays"]) || empty($_POST["PostalCode"]) || empty($_POST["HomeNumber"]) || empty($_POST["StreetName"]) || empty($_POST["PlaceOfResidence"])) {
            echo "Alle velden dienen ingevuld te worden.";
        }
        // Checks if given e-mail is valid.
        elseif (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
            echo "Ongeldig e-mailadres.";
        }
        // Makes an array using the user's answers as values.
        else {
            $user_data = array(
                "gender" => $_POST["Gender"],
                "first_name" => $_POST["FirstName"],
                "last_name" => $_POST["LastName"],
                "birthday" => $_POST["Birthday"],
                "email" => $_POST["Email"],
                "estimated" => $_POST["EstimatedDays"],
                "postal" => $_POST["PostalCode"],
                "home_number" => $_POST["HomeNumber"],
                "street_name" => $_POST["StreetName"],
                "place_of_residence" => $_POST["PlaceOfResidence"],
                "promotions" => $_POST["Promotions"],
            );
            // Adds the userdata in the created list
            $_SESSION['users'][] = $user_data;
        }
    }
}

// Loops through the users list, looping through the user_data, looping through each key and value and printing the values.
foreach ($_SESSION['users'] as $user_data) {
    foreach ($user_data as $key=>$value) {
        echo $value."<br>";
    }
    echo "<br>";
}

// Resets the users list.
echo "<form method='POST' action='clear-session.php'><input type='submit' name='reset' value='Reset'></form>";

