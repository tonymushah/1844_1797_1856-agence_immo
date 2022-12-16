<!DOCTYPE html>
<html lang="en">
    <head>        
        <script src="./resources/bootstrap-5.2.3-dist/js/bootstrap.bundle.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="./resources/bootstrap-5.2.3-dist/css/bootstrap.css">
        <style>
            
        </style>
    </head>
    <body>

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
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab"
                                aria-controls="login" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="sign_in-tab" data-bs-toggle="tab" data-bs-target="#sign_in" type="button" role="tab"
                                aria-controls="sign_in" aria-selected="false">Sign in</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
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
                                            `<div class="alert alert-danger alert-dismissible" role="alert">`,
                                            `   <div>${err.response.data.message}</div>`,
                                            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                                            '</div>'
                                        ].join('')
                                    });
                                })
                            </script>
                        </div>
                        <div class="tab-pane fade" id="sign_in" role="tabpanel" aria-labelledby="sign_in-tab">
                            <h1>dsadsadds</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>