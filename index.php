<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="System zarządzania siecią sklepów osiedlowych" />
        <title>SWZSSO</title>

        <!--logo-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!--CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php
            include 'config/config.php';
            session_start();

            if(isset($_SESSION["login"])) {
                if($_SESSION["login"] == 'err') {
                    if(isset($_GET["register"])) {
                        include 'pages/register.php';
                    } else {
                        include 'pages/login.php';
                    }
                } else {
                    if ($_SESSION["type"] == "user") {
                        include 'pages/menu.php';
                        include 'pages/shop-items.php';
                        include 'pages/footer.php';
                    } elseif ($_SESSION["type"] == "admin") {
                        include 'pages/admin-panel.php';
                    } elseif ($_SESSION["type"] == "worker") {
                        include 'pages/menu.php';
                        include 'pages/worker-panel.php';
                        include 'pages/footer.php';
                    }
                }
            } else {
                if(isset($_GET["register"])) {
                    include 'pages/register.php';
                } else {
                    include 'pages/login.php';
                }
            }

            include 'pages/modals.php';
        ?>

        <script src="./js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="./js/scripts.js" type="text/javascript"></script>
        <script src="./js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="./ajax/login.js" type="text/javascript"></script>
        <script src="./ajax/logout.js" type="text/javascript"></script>
        <script src="./ajax/register.js" type="text/javascript"></script>
        <script src="./js/events.js" type="text/javascript"></script>
    </body>
</html>
