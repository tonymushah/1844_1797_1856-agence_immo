<?php
    include("./resources/func/loginVerifier.php");
    session_start();
    verify_session("home.php");
    include("./resources/expections/Login_Error.php");
    include("./resources/classes/Client.php");
    include("./resources/classes/SQL_Client_Connection.php");
    $connection = SQL_Admin_Connection::connect();
    $client = Client::getClientById($connection, $_SESSION["client_id"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="./resources/bootstrap-5.2.3-dist/css/bootstrap.css">
    <style>

    </style>
</head>

<body>
    <script src="./resources/bootstrap-5.2.3-dist/js/bootstrap.bundle.js"></script>
    <script src="./resources/js/axios.min.js"></script>
    <?php
        include("./resources/pages/home/layout.php");
        custom_header($client);
    ?>
    <div
        class="container"
    >
        <div
            class="row"
        >
            
                <?php
                    include("./resources/classes/Habitation.php");
                    include("./resources/classes/Photo_Habitation.php");
                    include("./resources/componnents/Habitation_Com.php");
                    foreach (Habitation::getAll_good($connection) as $key => $value) {
                        ?>
                            <div
                                class="col m-1"
                            >
                                <?php show_habitation_as_card($connection, $value); ?>
                            </div>
                        <?php
                    }
                ?>
        </div>
    </div>
</body>

</html>