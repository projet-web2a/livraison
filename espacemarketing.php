<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EyeZone Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>EyeZone</h1>
                            </div>
                            <p>Welcome to the Admin Dashbord</p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <h1>Les événements</h1>
                            <h2>Les événements à ajouter</h2>
                            <form method="post"  action="view/ajouterevenement.php" id="enregisterevenement" >
                                <div class="form-group">
                                        <input id="Nom" type="text" name="Nom" required data-msg="Entrez le nom de l'événement" class="input-material">
                                    <label for="Nom" class="label-material">Nom de l'événement</label>
                                </div>
                                <div class="form-group">
                                    <input id="Datedebut" type="date" name="Datedebut" required data-msg="Entrez la date de début de l'événement" class="input-material">

                                </div>
                                <div class="form-group">
                                    <input id="Datefin" type="date" name="Datefin" required data-msg="Entrez la date de fin de l'événement" class="input-material">
                                </div>
                                <div class="form-group">
                                    <input id="Image" type="file" name="Image" required data-msg="Entrez le chemin de l'image de l'événement" class="input-material">
                                    <label for="Image" class="label-material">Lien de l'image</label>
                                </div>
                                <div class="form-group">
                                        <input id="Description" type="text" name="Description" required data-msg="Entrez la description de l'événement" class="input-material">
                                    <label for="Description" class="label-material">Description</label>
                                </div>
                                <input id="formsend" type="submit" name="formsend" class="btn btn-primary">
                                <a href="view/afficherevenement.php"  class="btn btn-primary">Afficher</a>

                                <!-- <a id="login"  class="btn btn-primary">Login</a>-->
                                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                            </form> <br/>



                            <!-- <a id="login"  class="btn btn-primary">Login</a>-->

                            <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                            <a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.php" class="signup">Signup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights text-center">
        <p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
    </div>
</div>
<!-- JavaScript files-->
<script src="js/dateevenement.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper.js/umd/popper.min.js"> </script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- Main File-->
<script src="js/front.js"></script>
</body>
</html>