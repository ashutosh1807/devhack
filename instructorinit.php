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
        <a href="#name"><span class="white-text name"><?php echo $_SESSION['name'];?></span></a>
        <a href="#email"><span class="white-text email"><?php echo $_SESSION['user'];?>@iitdh.ac.in</span></a>
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
          <span class="card-title">Instructor</span>
          <button class="nav-link" onclick="Gencode()">Generate Code</button>
          <p id="code"></p>
          <button class="nav-link" onclick="timer()">Start timer</button>
          <p id="demo"></p>

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
        function Gencode(){
            document.getElementById('code').innerHTML=Math.floor(1000 + Math.random() * 9000);
            $.ajax({
                url: 'code.php',
                type: 'POST',
                data: {
                    message: document.getElementById('code').innerHTML
                },            
            });
        }
        function timer(){
          var today = new Date();
          var newDateObj = new Date(today.getTime()+ 3*6000);

          var x = setInterval(function() {
          var now = new Date().getTime();
            var distance = newDateObj - now;
            
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if(seconds%10==0){
              Gencode();
            }
            document.getElementById("demo").innerHTML =  seconds + "s ";

            if (distance < 0) {
              clearInterval(x);
              document.getElementById("demo").innerHTML = "EXPIRED";
              $.ajax({
                url: 'code.php',
                success: function(){
                  window.location.href="instructor.php";
                }

            });
              
            }
          }, 1000);
        }
      </script>
    </body>
  </html>