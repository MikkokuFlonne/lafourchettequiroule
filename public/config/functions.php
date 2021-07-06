<?php

// Pour mettre le premier char en majuscule 
function mb_ucfirst($string, $encoding = 'UTF-8'){
    $strlen = mb_strlen($string, $encoding);
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, $strlen - 1, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}


function heureFormat($time){
    $time = date('H:i',strtotime($time));
    $time = str_replace(':', 'H', $time);
    return $time;
}

function isAdmin() {
    $user = $_SESSION['user'] ?? false;

    if ($user) {
        $newUser = DB::query('SELECT * FROM user WHERE id = '.$user->id);
        $_SESSION['user']= $newUser[0];
        $user = $_SESSION['user'];
    }

    if ($user && $user->is_admin == true) {
        return true;
    }

    return false; // Le user n'est pas administrateur
}
