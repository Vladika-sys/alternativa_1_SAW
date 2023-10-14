<?php
session_start ();
if(!isset($_SESSION["login"])) {
    header("location: ../login_form.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css">
    <title>Document</title>
</head>

<body>
<nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3 navbar-light" id="mainNav">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span>Brand</span></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="features.html">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="integrations.html">Integrations</a></li>
                <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
            </ul>
            <!--            <a class="btn btn-primary shadow" role="button" href="./signup_form.php">Sign up</a>-->
        </div>
    </div>
</nav>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; width: 90%;">

        <div class="col" style="padding-top: 200px;">
            <?php
            require_once "../db/dbConnection.php";
            $dbConnection = connectMeToDB();
            $sql = "SELECT * FROM emails";
            $result = $dbConnection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $email = $row["email"];
                    $date = $row["data"];
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo "<div class='row mb-4'>";
                        echo "<div class='col-md-2 col-lg-12'>";
                        echo "<div class='card border-0 shadow'>";
                        echo "<div class='card-body p-4'>";
                        echo "<div class='d-flex align-items-center mb-3'>";
                        echo "<div class='flex-grow-1 ms-3'>";
                        echo "<h6 class='mb-0'>$email</h6>";
                        echo "<p class='small text-muted mb-0'>$date</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<p>Aici s-a inserat un input invalid</p>";
                    }
                }
            }
            ?>

        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>