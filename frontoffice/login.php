<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="./resources/bootstrap-5.2.3-dist/css/bootstrap.css">
        <style>
            
        </style>
    </head>
    <body>
        <script src="./resources/bootstrap-5.2.3-dist/js/bootstrap.bundle.js"></script>
        <script src="./resources/js/axios.min.js"></script>
        <div
            class="container"
        >
            <div
                class="row"
            >
                <div
                    class="col-8"
                >
                    <h1>Ajouter un titre ici</h1>
                </div>
                <div
                    class="col-4"
                >
                    <form
                        id="loginForm"
                    >
                        <div
                            id="alert-login"
                        >

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pseudo</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                                name="pseudo"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Mot de passe</label>
                            <input class="form-control" type="password" name="password"/>
                        </div>
                        <div
                            class="md-3"
                        >
                            <input class="form-controll" type="submit" value="Log in"/>
                        </div>
                    </form>
                    <script
                        defer
                    >
                        let login_form = document.getElementById("loginForm");
                        
                        login_form.addEventListener("submit", (e) => {
                            e.preventDefault();
                            let form = new FormData(login_form);
                            axios({
                                method : "post",
                                url: "/resources/api/log_in.php",
                                data: form
                            }).then((result) => {
                                location.pathname = "/home.php";
                            }).catch((err) => {
                                document.getElementById("alert-login").innerHTML = [
                                    `<div class="alert alert-error alert-dismissible" role="alert">`,
                                    `   <div>${err.response.data.message}</div>`,
                                    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                                    '</div>'
                                ].join('')
                            });
                        })
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>