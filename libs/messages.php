<?php
    function showError($message){
        echo "<span class='error'><i class='fa-solid fa-xmark'></i> $message</span>";
    }
    function showInfo($message){
        echo "<span class='info'><i class='fa-solid fa-triangle-exclamation'> $message</span>";
    }

    function showSuccess($message){
        echo "<span class='success'><i class='fa-solid fa-check'></i> $message</span>";
    }
?>