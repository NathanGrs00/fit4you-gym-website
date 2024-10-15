<?php
require_once 'member.class.php';

class MemberAdder{
    //Constructor is the first thing it does when called.
    public function __construct(){
        // Makes an array using the user's answers as values.
        $singleMember = new Member($_POST["Gender"], $_POST["FirstName"], $_POST["LastName"], $_POST["Birthday"], $_POST["Email"], $_POST["EstimatedDays"], $_POST["PostalCode"], $_POST["HomeNumber"], $_POST["StreetName"], $_POST["PlaceOfResidence"]);
        // Adds the array in the created array
        $_SESSION["users"][] = $singleMember;
        // Flavor text as confirmation
        echo "De registratie is gelukt! Wij zien u graag snel bij Fit4You!<br/>";
        echo "<button class='Button' onclick=location.href='index.html'>Terug</button>";
    }
}