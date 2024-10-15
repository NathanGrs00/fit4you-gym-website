<?php
    // require_once used to access files.
    require_once 'membercontroller.class.php';
    require_once 'validator.class.php';
    require_once 'addmember.class.php';
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/phpstyles.css">
    <title>Document</title>
</head>
<body>
    <div id="MainContent">
        <?php
        // Makes an empty array if none exist yet.
        if(!isset($_SESSION["users"])){
            $_SESSION["users"] = array();
        }

        // Makes variable a callable function of the MemberController class
        $memberAction = new MemberController();
        // Deletes members / Destroys the session.
        if (isset($_POST["MembersDel"])){
            echo $memberAction->deleteMember();
            exit();
        }
        // Shows the amount of member(s) if the button is pressed for it.
        if (isset($_POST["MembersCount"])){
            echo $memberAction->countMembers();
            exit();
        }
        // Shows all members through showMembers function in MemberController.
        if (isset($_POST["MembersSum"])){
            echo $memberAction->showMembers();
            exit();
        }

        // Checks if form is valid and if so, sends it to MemberAdder() in addmember.class.php.
        if(isset($_POST["Submit"])){
            $formValid = new FormHandler();
            //Checks if function returns False
            if (!$formValid->validateForm()){
                exit();
            }
            //Function returns True, form is valid.
            $addMember = new MemberAdder();
            exit();
        }
        ?>
    </div>
</body>
</html>

