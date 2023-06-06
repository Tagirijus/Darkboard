<?php

    // If I do not save the eventually saved variable,
    // the access to the Darkboard generated CSS route
    // will be count as "No access" and save this url
    // into the "redirectAfterLogin" key of the SESSION
    if (array_key_exists('redirectAfterLogin', $_SESSION)) {
        $saveRedirectAfterLogin = $_SESSION['redirectAfterLogin'];
        // if this variable is the darkboard css route, simply get rid of it
        if ($saveRedirectAfterLogin == '/darkboard/css') {
            $saveRedirectAfterLogin = '/';
        }
    }

?>

<link rel="stylesheet" href="/darkboard/css" media="screen">

<?php

    if (array_key_exists('redirectAfterLogin', $_SESSION)) {
        $_SESSION['redirectAfterLogin'] = $saveRedirectAfterLogin;
    }

?>