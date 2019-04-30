<?php 
 
require 'C:/xampp/htdocs/eyezone/entites/commande.php';
require 'C:/xampp/htdocs/eyezone/core/commandeC.php';


$cc=new commandeC();
$listeComande=$cc->afficherCommande();
$res=false;
$num=0;
$maction='afficher';
$par="";
$res1=false;
 if (isset($_GET['search']))
  {
    $idCommande=$_GET['search'];
    $listeProduit=$cc->afficher_ProduitsCommande($idCommande);
    $res=true;
   }

 
    if (isset($_POST['search']))
  {
    $idCommande=$_POST['search'];
    $listeProduit=$cc->afficher_ProduitsCommande($idCommande);
    $res=true;
   }
    if(isset($_GET['maction']))
            {$maction=$_GET['maction'];}
          if($maction=='trier')
            {
              $par=$_GET['par'];
              $listeComande=$cc->trier($par);
            }
            else if ($maction=='chercher')
          {
              if (isset($_POST['chercher']))
                {
                 $valeur=$_POST['chercher'];
                 if (isset($_POST['idCommande']))
                    $listeComande=$cc->chercherCommande('idCommande',$valeur);
                  else if (isset($_POST['username']))
                    $listeComande=$cc->chercherCommande('username',$valeur);
                   else if (isset($_POST['prixTotal']))
                    $listeComande=$cc->chercherCommande('prixTotal',$valeur);
                   else if (isset($_POST['dateCommande']))
                    $listeComande=$cc->chercherCommande('dateCommande',$valeur);
                    else if (isset($_POST['Reste']))
$listeComande=$cc->afficherCommande();
                  

                }

          }
        
   

?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'head.php'; ?>

</head>
<body>
	  <div class="page">
      <!-- Main Navbar-->
    <?php require'navbar.php'; ?>
      <div class="page-content d-flex align-items-stretch"> 

        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <?php require 'sidenavbar.php'; ?>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Commandes</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Commandes</li>
            </ul>
          </div>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div >
                  <div class="card">
                    <div class="card-close">
                   
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Liste Des Commandes</h3>

                    </div>

                    <div class="card-body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <div class="dropdown">
                          
  <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Trier Par
  </a>

  <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item " href="listedescommandes.php?maction=trier&par=dateCommande">Date Commande</a>
    <a class="dropdown-item " href="listedescommandes.php?maction=trier&par=PrixTotal">Prix Commande</a>
    <a class="dropdown-item " href="listedescommandes.php?maction=trier&par=idCommande">Id Commande</a>
  </div>
</div>
    
    </ul>
    <form name="f" action="listedescommandes.php?maction=chercher" class="form-inline my-2 my-lg-0" method="post">
  <div class="input-group">
  <input type="text" class="form-control" name="chercher"  aria-label="Text input with dropdown button"  >
   <div class="input-group-append">
    <button class="btn btn-outline-secondary dropdown-toggle" type="submit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Chercher Par </button> 

    <div class="dropdown-menu">
     
      <input type="submit"  class="dropdown-item" name="dateCommande" value="Date Commande">
      <input type="submit"  class="dropdown-item" name="prixTotal"value="Prix Commande">
      <input type="submit"  class="dropdown-item" name="username"value="Username">
      <input type="submit"  class="dropdown-item" name="idCommande" value="Id Comande">
    </div> 
  </div>
  <input type="submit" name="reste" class="btn btn-outline-secondary " value="Reste">
</form>

  </div>
  <script type="text/javascript">
    /*onchange="myFunction()"
function myFunction(){
    var NameValue = document.forms["f"]["chercher"].value;

alert(NameValue);

 }*/
</script>


</nav>
  

                      <div class="table-responsive">

                        <table class="table table-bordered table-hover table-dark ">
                            <thead >
                             <tr>
                              <th scope="col">ID Commande</th>
                              <th scope="col">Date Commande</th>
                              <th scope="col">Etat</th>
                              <th scope="col">Prix Total</th>
                              <th scope="col">username</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                        <?php foreach($listeComande as $Comande): ?>
                            <tr>
                              <td> <?= $Comande->idCommande; ?> </td>
                              <td> <?= $Comande->dateCommande ?> </td>
                              <td> <?= $Comande->etat; ?> </td>
                              <td> <?= $Comande->prixTotal; ?> </td>
                              <td> <?= $Comande->username; ?> </td>
                              <td>
                                      <a href="validercommande.php?id=<?=$Comande->idCommande ?>"   class="btn btn-info"> Valider </a>
                                      <a onclick="return confirm('Are you sure you want to delete this entry ?')" href="Supprimercommande.php?id=<?=$Comande->idCommande ?>" class="btn btn-danger"> Supprimer </a>
                                    </td>
                            </tr>
                          </tbody>
                                    <?php endforeach; ?>

                            </table>
                      </div>
                    </div>
                  </div>
                </div>
              
        
               

              </div>
            </div>
          </section>

          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>EyeZone</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>&nbsp;</p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>