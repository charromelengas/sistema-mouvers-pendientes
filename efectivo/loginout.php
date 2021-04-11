<?php
    //destruir todas las variables de sesión
    $_SESSION = array();

    if(ini_get("session.use_cookies")){
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() -42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    }

        //finalmente, destruir la sesión
    session_destroy();

    header('Location:loginreynosa.php');



?>