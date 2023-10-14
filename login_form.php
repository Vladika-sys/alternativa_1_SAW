<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3 navbar-light" id="mainNav">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span>Brand</span></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="features.html">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="integrations.html">Integrations</a></li>
                <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="contacts.html">Contacts</a></li>
            </ul>
            <a class="btn btn-primary shadow" role="button" href="./signup_form.php">Sign up</a>
        </div>
    </div>
</nav>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row w-50">
        <div class="col">
            <form method="post" action="./admin/login.php" class="needs-validation" data-bs-theme="light" novalidate>
                <?php
                session_start();
                if (isset($_SESSION['auth_error'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['auth_error'] . '</div>';
                    unset($_SESSION['auth_error']);
                }
                ?>
                <div class="mb-3">
                    <input class="shadow form-control" id="login" type="text" value="" name="login" placeholder="login">
                    <span class="error-message" id="login-error"></span>
                </div>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback"></div>
                <div class="mb-3">
                    <input class="shadow form-control" id="password" type="password" name="password" placeholder="Password">
                    <span class="error-message" id="password-error"></span>
                </div>
                <div class="mb-5">
                    <input value="Login" class="btn btn-primary shadow" name="submit" type="submit"/>
                </div>
            </form>

            <p class="text-muted"><a href="./signup_form.php">Vreau un cont</a></p>
        </div>
    </div>
</div>

</body>
<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     const form = document.querySelector("form.needs-validation");
    //
    //     form.addEventListener("submit", function (event) {
    //         const loginInput = document.getElementById("login");
    //         const passwordInput = document.getElementById("password");
    //         const loginError = document.getElementById("login-error");
    //         const passwordError = document.getElementById("password-error");
    //
    //         const loginRegex = /^[A-Za-z0-9]+$/;
    //         if (!loginRegex.test(loginInput.value)) {
    //             loginError.textContent = "Loginul invalid";
    //             loginInput.classList.add("is-invalid");
    //             event.preventDefault();
    //         } else {
    //             loginError.textContent = "";
    //             loginInput.classList.remove("is-invalid");
    //         }
    //
    //         if (passwordInput.value.length < 8 || passwordInput.value.length > 36) {
    //             passwordError.textContent = "Parola trebuie să aibă cel puțin 8 caractere și maxim 36";
    //             passwordInput.classList.add("is-invalid");
    //             event.preventDefault();
    //         } else {
    //             passwordError.textContent = "";
    //             passwordInput.classList.remove("is-invalid");
    //         }
    //     });
    // });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>


</html>