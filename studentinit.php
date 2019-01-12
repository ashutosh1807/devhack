<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <?php  session_start();  ?>
  <ul id="slide-out" class="sidenav">
      <li><div class="user-view">
        <div class="background">
          <img src="images/office.jpg">
        </div>
        <a href="#user"><img class="circle" src="yuna.jpg"></a>
        <a href="#name"><span class="white-text name"><?php $_SESSION['name']?></span></a>
        <a href="#email"><span class="white-text email"><?php $_SESSION['user']?>@iitdh.ac.in</span></a>
      </div></li>
      <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
      <li><a href="#!">Second Link</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Subheader</a></li>
      <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

    <div class="row">
    <div class="col s12 m6">
      <div class="card large">
        <div class="card-content">
          <span class="card-title">Student</span>
        </div>
      </div>
    </div>
    
  </div>
      <!--JavaScript at end of body for optimized loading-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
    $('.sidenav').sidenav();
  });
        
      </script>
    </body>
  </html>