<?php
// Member stores protected variables.
class Member{
    protected $gender;
    protected $first_name;
    protected $last_name;
    protected $birthday;
    protected $email;
    protected $estimated;
    protected $postal;
    protected $home_number;
    protected $street_name;
    protected $place_of_residence;
}
class memberController extends Member{
    // Gets parameters from main.php and sets them to the variables.
    public function setMember($gender, $first_name, $last_name, $birthday, $email, $estimated, $postal, $home_number, $street_name, $place_of_residence){
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
        return "Geslacht: ".$this->gender."<br> Voornaam: ".$this->first_name."<br> Achternaam: ".$this->last_name."<br> Geboortedatum: ".$this->birthday."<br> E-mail: ".$this->email."<br> Geschatte trainingsdagen: ".$this->estimated."<br> Postcode: ".$this->postal."<br> Huisnummer: ".$this->home_number."<br> Straatnaam: ".$this->street_name."<br> Woonplaats: ".$this->place_of_residence;
    }
    // Function for returning the amount of members.
    public function countMembers(){
        $userCount = count($_SESSION["users"]);
        // Checks if there are no members.
        if ($userCount == 0){
            return "Er zijn geen leden momenteel.<br>";
        }
        // Checks if there is 1 member, reason is for proper grammar.
        elseif ($userCount == 1){
            return "Er is 1 lid ingeschreven.<br>";
        }
        // Returns the number of members.
        else{
            return "Er zijn ".$userCount. " leden aangemeld.<br>";
        }
    }
    public function deleteMember(){
        session_destroy();
        return "De leden zijn succesvol verwijderd. <br/><button class='Button' onclick=location.href='index.html'>Terug</button>";
    }
}