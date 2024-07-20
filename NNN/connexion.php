<?php

if($code = mysqli_connect('localhost', 'root', ''))
{
    if(!mysqli_select_db($code, 'pfetroc'))
    {
        echo "connexion echouer";
    }
}

?>
