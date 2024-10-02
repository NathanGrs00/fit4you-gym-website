<?php
session_start();
class Lid{
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
}

class LidController extends Lid{
    public function getMember(){

    }
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
    public function countMembers(){

    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title></title>
</head>
<body>

</body>
</html>
