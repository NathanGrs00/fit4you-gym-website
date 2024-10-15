<?php
require_once 'error.class.php';

class FormHandler {
    public function validateForm(){
        $errorMessage = new ErrorHandler();
        //Checks if any fields are empty.
        if (empty($_POST["Gender"]) || empty($_POST["FirstName"]) || empty($_POST["LastName"]) || empty($_POST["Birthday"]) || empty($_POST["Email"]) || empty($_POST["EstimatedDays"]) || empty($_POST["PostalCode"]) || empty($_POST["HomeNumber"]) || empty($_POST["StreetName"]) || empty($_POST["PlaceOfResidence"])) {
            // Calls the error function and returns False.
            $errorMessage->showError("Alle velden dienen ingevuld te worden.");
            return False;
        }
        // Checks if given e-mail is valid.
        elseif (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)){
            $errorMessage->showError("Ongeldig e-mailadres.<br/>");
            return False;
        }
        // Returns true if form is valid.
        return True;
    }
}