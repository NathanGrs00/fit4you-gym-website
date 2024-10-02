<?php
session_start();
// Makes an empty array if none exist yet.
if(!isset($_SESSION["users"])){
    $_SESSION["users"] = array();
}
if (isset($_POST["MembersDel"])){
    if($_POST["MembersDel"]){
        session_destroy();
        echo "De leden zijn succesvol verwijderd. <br/>";
        echo "<a href='index.html'>Terug</a>";
        exit();
    }
}
// Shows the amount of member(s) if the button is pressed for it.
if (isset($_POST["MembersCount"])){
    if($_POST["MembersCount"]){
        $userCount = count($_SESSION["users"]);
        if ($userCount == 1){
            echo "Er is 1 lid ingeschreven.<br/>";
        }
        else{
            echo "Er zijn ",$userCount, " leden aangemeld.<br/>";
        }
        echo "<a href='index.html'>Terug</a>";
        exit();
    }
}

// Checks if 'submit' button has been pressed.
if(isset($_POST["Submit"])){
    if ($_POST["Submit"]){

        // Checks if there are no empty fields
        if (empty($_POST["Gender"]) || empty($_POST["FirstName"]) || empty($_POST["LastName"]) || empty($_POST["Birthday"]) || empty($_POST["Email"]) || empty($_POST["EstimatedDays"]) || empty($_POST["PostalCode"]) || empty($_POST["HomeNumber"]) || empty($_POST["StreetName"]) || empty($_POST["PlaceOfResidence"])) {
            echo "Alle velden dienen ingevuld te worden.<br/>";
            echo "<a href='index.html'>Terug</a>";
            exit();
        }
        // Checks if given e-mail is valid.
        elseif (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)){
            echo "Ongeldig e-mailadres.<br/>";
            echo "<a href='index.html'>Terug</a>";
            exit();
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
                "place_of_residence" => $_POST["PlaceOfResidence"]
            );
            // Adds Promotions outside of array and sets it to yes or no, because otherwise it messes with the gender radio option.
            if (isset($_POST["Promotions"])){
                $user_data['promotions'] = "Ja"; //
            } else {
                $user_data['promotions'] = "Nee"; //
            }
            // Adds the userdata in the created list
            $_SESSION["users"][] = $user_data;
        }
    }
}
// Shows the values of $user_data using the switch function.
if (isset($_POST["MembersSum"])){
    if ($_POST["MembersSum"]){
        // Loops through the users list, looping through the user_data, looping through each key and value and printing the values.
        foreach ($_SESSION["users"] as $user_data){
            foreach ($user_data as $key => $value){
                switch ($key){
                    case "gender":
                        echo "Geslacht: ", $value, "<br/>";
                        break;
                    case "first_name":
                        echo "Voornaam: ", $value, "<br/>";
                        break;
                    case "last_name":
                        echo "Achternaam: ", $value, "<br/>";
                        break;
                    // Formatting the birthday from yyyy/mm/dd to reversed format.
                    case "birthday":
                        $date = DateTime::createFromFormat('Y-m-d', $value);
                        echo "Geboortedatum: ", $date->format('d/m/Y'), "<br>";
                        break;
                    case "email":
                        echo "E-mail: ", $value, "<br/>";
                        break;
                    case "estimated":
                        echo "Geschatte trainingsdagen: ", $value, "<br/>";
                        break;
                    case "postal":
                        echo "Postcode: ", $value, "<br/>";
                        break;
                    case "home_number":
                        echo "Huisnummer: ", $value, "<br/>";
                        break;
                    case "street_name":
                        echo "Straatnaam: ", $value, "<br/>";
                        break;
                    case "place_of_residence":
                        echo "Woonplaats: ", $value, "<br/>";
                        break;
                    case "promotions":
                        echo "Wil promoties ontvangen? ", $value, "<br/>";
                        break;
                }
            }
            echo "<br/><hr><br/>";
        }
        echo "<a href='index.html'>Terug</a>";
        exit();
    }
}
// Flavor text as confirmation :)
echo "De registratie is gelukt! Wij zien u graag snel bij Fit4You!<br/>";
echo "<a href='index.html'>Terug</a>";
