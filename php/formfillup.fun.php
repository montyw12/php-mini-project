<?php

if($_POST["submit"] ?? false){
    $sData = $_POST;
    



    $a = base64_encode(json_encode($sData));
    header("location: ./../formfillup.php?a=" . $a);

} else {
    echo "INVLID PAGE ACCESS";
}