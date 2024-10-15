<?php
require_once 'member.class.php';

class MemberController{
    // Function for returning the amount of members.
    public function countMembers(){
        $userCount = count($_SESSION["users"]);
        // Checks if there are no members and sets a variable to the answer.
        if ($userCount == 0){
            $countMessage = "Er zijn geen leden momenteel.<br>";
        }
        // Checks if there is 1 member, reason is for proper grammar.
        elseif ($userCount == 1){
            $countMessage = "Er is 1 lid ingeschreven.<br>";
        }
        // Sets variable to the number of members.
        else{
            $countMessage = "Er zijn ".$userCount. " leden aangemeld.<br>";
        }
        // Returns the variable + a button.
        return $countMessage . "<button class='Button' onclick=location.href='index.html'>Terug</button>";
    }
    public function deleteMember(){
        //Destroys session, and so also the members. If there are more session variables in a bigger project, it needs to be manually deleted.
        session_destroy();
        return "De leden zijn succesvol verwijderd. <br/><button class='Button' onclick=location.href='index.html'>Terug</button>";
    }
    public function showMembers() {
        //Stores a string in a variable and keeps adding things to the variable.
        $output = "<div id='FormInfo'>";
        // Iterates through members and calls the getMember() function in member.class.php.
        foreach ($_SESSION["users"] as $member) {
            $output .= "<div id='PersonalInfo'>";
            $output .= $member->getMember();
            $output .= "</div>";
        }
        $output .= "</div>";
        $output .= "<button class='Button' onclick=location.href='index.html'>Terug</button>";
        // Returns the whole thing.
        return $output;
    }
}