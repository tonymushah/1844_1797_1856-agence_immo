<?php
    include("./resources/func/loginVerifier.php");
    session_start();
    verify_session(null);
    include("./resources/expections/Login_Error.php");
    include("./resources/classes/Client.php");
    include("./resources/classes/SQL_Client_Connection.php");
    include("./resources/classes/Habitation.php");
    include("./resources/classes/Photo_Habitation.php");
                    include("./resources/componnents/Habitation_Com.php");
    $connection = SQL_Admin_Connection::connect();
    $client = Client::getClientById($connection, $_SESSION["client_id"]);
    $habitation;
    if(isset($_GET["habitation"])){
        $habitation = Habitation::getByID($connection, $_GET["habitation"]);
    }else{
        header("Location: /");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Habitation : <?php
            echo $habitation->get_id();
        ?></title>
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
        <?php
            $all_photo = Photo_Habitation::getByHabitationID($connection, $habitation->get_id());
            $photo_to_use = $all_photo[rand(0, count($all_photo) - 1)];
        ?>
        <div
            class="container"
            style="
                background-image: url('/resources/photo/<?php echo $photo_to_use->get_lien(); ?>'); 
                background-size: cover;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                "
        >
            <div
                class="row"
            >
                
                <div
                    class="col"
                    style="
                        margin: 220px 100px;
                    "
                >
                    <h1
                        style="text-align: center; border-radius: 10px;"
                        class=" text-bg-light"
                    ><?php
                        echo $habitation->get_description();
                    ?></h1>
                </div>
            </div>
        </div>
        <div
            class="container"
        >
            <div
                class="row"
            >
                <h2 class=" text-center">Reserver ??</h2>
            </div>
            <div
                class="row"
            >
                <div
                    class="col-6"
                >
                    <form
                        id="reservation-form"
                    >
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                            <input type="date" required class="form-control" name="dateDebut" id="exampleFormControlInput1" placeholder="Start Date">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">End Date</label>
                            <input type="date" required class="form-control" name="dateFin" id="exampleFormControlInput1" placeholder="End Date">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-danger">Reserver</button>
                        </div>
                    </form>
                    <script defer>
                        let reservation = document.getElementById("reservation-form");
                        reservation.addEventListener("submit", (e) => {
                            e.preventDefault();
                            let form = new FormData(reservation);
                            form.append("idHabitation", <?php
                                echo $habitation->get_id();
                            ?>);
                            axios({
                                method : "post",
                                url: "/resources/api/do_reservation.php",
                                data: form
                            }).then((result) => {
                                document.getElementById("form-error-col").innerHTML = [
                                            `<div class="alert alert-success alert-dismissible" role="alert">`,
                                            `   <div>${"Your reservation has been submitted"}</div>`,
                                            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                                            '</div>'
                                        ].join('')
                            }).catch((err) => {
                                document.getElementById("form-error-col").innerHTML = [
                                            `<div class="alert alert-danger alert-dismissible" role="alert">`,
                                            `   <div>${err.response.data.message}</div>`,
                                            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                                            '</div>'
                                        ].join('')
                            });
                        })
                    </script>
                </div>
                <div
                    class="col-6"
                    id="form-error-col"
                >
                </div>
                <div
                    class="row"
                >
                    <div></div>
                </div>
            </div>
        </div>
    </body>
</html>