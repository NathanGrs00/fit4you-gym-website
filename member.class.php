<?php
// Member stores private variables.
class Member
{
    private $gender;
    private $first_name;
    private $last_name;
    private $birthday;
    private $email;
    private $estimated;
    private $postal;
    private $home_number;
    private $street_name;
    private $place_of_residence;

    // Gets parameters from addmember.class.php and sets them to the variables.
    public function __construct($gender, $first_name, $last_name, $birthday, $email, $estimated, $postal, $home_number, $street_name, $place_of_residence)
    {
        $this->gender = $gender;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birthday = $birthday;
        $this->email = $email;
        $this->estimated = $estimated;
        $this->postal = $postal;
        $this->home_number = $home_number;
        $this->street_name = $street_name;
        $this->place_of_residence = $place_of_residence;
    }

    // Returns the variables with some html.
    public function getMember(){
        return "Geslacht: " . $this->gender . "<br> Voornaam: " . $this->first_name . "<br> Achternaam: " . $this->last_name . "<br> Geboortedatum: " . $this->birthday . "<br> E-mail: " . $this->email . "<br> Geschatte trainingsdagen: " . $this->estimated . "<br> Postcode: " . $this->postal . "<br> Huisnummer: " . $this->home_number . "<br> Straatnaam: " . $this->street_name . "<br> Woonplaats: " . $this->place_of_residence;
    }
}

