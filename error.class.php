<?php
class ErrorHandler{
    //showError function because of repeating code. parameter is the message.
    public function showError($message){
        echo $message."<br>";
        echo "<button class='Button' onclick=location.href='index.html'>Terug</button>";
        exit();
    }
}