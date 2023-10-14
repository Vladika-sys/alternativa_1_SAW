<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3 navbar-light" id="mainNav">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span>Brand</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
            </ul><a class="btn btn-primary shadow" role="button" href="./signup_form.php">Sign up</a>
        </div>
    </div>
</nav>
<header class="pt-5">
   <div class="container mt-4">
       <div class="row d-flex justify-content-center align-items-center s">

           <div class="col-md-6">


               <div class="card">


                   <div class="text-center">

                       <img src="https://i.imgur.com/Dh7U4bp.png" width="200">
                       <span class="d-block mt-3">Aboneaza-te pentru a fi la curent cu cele mai noi stiri</span>

                       <div class="mx-5">
                           <?php
                            session_start();
                            if(isset($_SESSION["message"])){
                                echo "<div class='alert alert-secondary'>".$_SESSION["message"]."</div>";
                                unset($_SESSION["message"]);
                            }
                           ?>
                           <form class="input-group mb-3 mt-4 needs-validation" action="./subscribe.php" method="POST" novalidate>
                               <div class="mb-3">
                                   <input type="text" class="form-control" id="email" name="email" placeholder="Introduce-ti emailul" aria-label="Recipient's username" aria-describedby="button-addon2">
                                   <span class="error-message" id="email-error"></span>
                               </div>
                               
                               <div class="mb-3">
                                   <div class="valid-feedback"></div>
                                   <div class="invalid-feedback"></div>
                               </div>
                                  <div class="mb-3" style="margin-left: 80px;">
                                      <input class="btn btn-success border-rad" value="Aboneaza-te" type="submit" name="submit" id="button-addon2"></input>
                                      
                                  </div>
                           </form>


                       </div>

                   </div>

               </div>

           </div>




       </div>
   </div>
</header>

</body>
<!--<script>-->
<!--    window.addEventListener('load', function () {-->
<!--        const form = document.querySelector("form.needs-validation");-->
<!---->
<!--        form.addEventListener("submit", function (event) {-->
<!--            const emailInput = document.getElementById("email");-->
<!--            const emailError = document.getElementById("email-error");-->
<!---->
<!--          const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;-->
<!--            if (!emailRegex.test(emailInput.value)) {-->
<!--                emailError.textContent = "Loginul invalid";-->
<!--                emailInput.classList.add("is-invalid");-->
<!--                event.preventDefault();-->
<!--            } else {-->
<!--                emailError.textContent = "";-->
<!--                emailInput.classList.remove("is-invalid");-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>