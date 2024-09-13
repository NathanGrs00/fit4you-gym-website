<?php
session_start();

if(isset($_POST["submit"])) {
    if($_POST["submit"]) {

        if(empty($_POST["Gender"]) || empty($_POST["FirstName"]) || empty($_POST["LastName"]) || empty($_POST["Birthday"]) || empty($_POST["Email"]) || empty($_POST["EstimatedDays"]) || empty($_POST["PostalCode"]) || empty($_POST["HomeNumber"]) || empty($_POST["StreetName"]) || empty($_POST["PlaceOfResidence"])){
            echo "Alle velden dienen ingevuld te worden.";
        }

        elseif (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
            echo "Ongeldig e-mailadres.";
        }
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

            $_SESSION['user_info'][] = $user_data;


            for ($i=0; $i<count($_SESSION['user_info']); $i++) {
                echo $_SESSION['user_info'][1];
            }
        }
    }
}