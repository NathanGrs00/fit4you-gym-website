<?php
// require_once used to access the class file.
require_once 'member.php';
session_start();

// Makes an empty array if none exist yet.
if(!isset($_SESSION["users"])){
    $_SESSION["users"] = array();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="phpstyles.css">
    <title>Document</title>
</head>
<body>
    <div id="MainContent">
        <?php
        // Deletes members / Destroys the session.
        if (isset($_POST["MembersDel"])){
            if($_POST["MembersDel"]){
                $memberDelete = new memberController();
                echo $memberDelete->deleteMember();
                exit();
            }
        }

        // Shows the amount of member(s) if the button is pressed for it.
        if (isset($_POST["MembersCount"])){
            if($_POST["MembersCount"]){
                $memberCount = new memberController();
                echo $memberCount->countMembers();
                // echo'ing the button here, not in member.php because of repeat code.
                echo "<button class='Button' onclick=location.href='index.html'>Terug</button>";
                exit();
            }
        }

        // Checks if 'submit' button has been pressed.
        if(isset($_POST["Submit"])){
            if ($_POST["Submit"]){

                // Checks if there are no empty fields
                if (empty($_POST["Gender"]) || empty($_POST["FirstName"]) || empty($_POST["LastName"]) || empty($_POST["Birthday"]) || empty($_POST["Email"]) || empty($_POST["EstimatedDays"]) || empty($_POST["PostalCode"]) || empty($_POST["HomeNumber"]) || empty($_POST["StreetName"]) || empty($_POST["PlaceOfResidence"])) {
                    echo "Alle velden dienen ingevuld te worden.<br/>";
                    echo "<button class='Button' onclick=location.href='index.html'>Terug</button>";
                    exit();
                }
                // Checks if given e-mail is valid.
                elseif (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)){
                    echo "Ongeldig e-mailadres.<br/>";
                    echo "<button class='Button' onclick=location.href='index.html'>Terug</button>";
                    exit();
                }
                // Makes an array using the user's answers as values.
                else {
                    $singleMember = new memberController();
                    $singleMember->setMember($_POST["Gender"], $_POST["FirstName"], $_POST["LastName"], $_POST["Birthday"], $_POST["Email"],$_POST["EstimatedDays"],$_POST["PostalCode"],$_POST["HomeNumber"],$_POST["StreetName"],$_POST["PlaceOfResidence"]);
                    // Adds the member in the created list
                    $_SESSION["users"][] = $singleMember;
                }
            }
        }

            // Iterates through members and calls the getMember() function in member.php.
            if (isset($_POST["MembersSum"])){
                if ($_POST["MembersSum"])
                    // Loops through the users and prints the info. No more double foreach loops needed.
                    echo "<div id='FormInfo'>";
                        foreach ($_SESSION["users"] as $member){
                            echo "<div id='PersonalInfo'>";
                                echo $member->getMember();
                                echo "<br/><br/>";
                            echo "</div>";
                        }
                    echo "</div>";
                    echo "<button class='Button' onclick=location.href='index.html'>Terug</button>";
                    exit();
            }
        // Flavor text as confirmation, only runs when making new members, the reason for the usage of exit()'s :)
        echo "De registratie is gelukt! Wij zien u graag snel bij Fit4You!<br/>";
        echo "<button class='Button' onclick=location.href='index.html'>Terug</button>";
        ?>
    </div>
</body>
</html>

