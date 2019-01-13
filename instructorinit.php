<!DOCTYPE html>
  <html>
    <head>
    <title> Instructor Dashboard </title>  
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, user-scalable=no" />
      <link rel="manifest" href="manifest.json" />
    </head>

    <body>
    <?php  session_start(); 
   /* if( !isset($_SESSION["user"]) ){
      header('Location: index.php'); 
    }*/
    
    ?>

  <ul id="slide-out" class="sidenav">
      <li><div class="user-view">
        <div class="background">
          <img src="images/office.jpg">
        </div>
        <a href="#user"><img class="circle" src="yuna.jpg"></a>
        <a href="#name"><span class="white-text name"><?php echo $_SESSION['name'];?></span></a>
        <a href="#email"><span class="white-text email"><?php echo $_SESSION['user'];?>@iitdh.ac.in</span></a>
      </div></li>
      <li><a href="#live-session"><i class="material-icons">live_help</i>Start Live Session</a></li>
      <li><a href="#statistics">Course attendance</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Resources</a></li>
      <li><a class="waves-effect" href="#lectures">Previous Lectures</a></li>
      <li><a class="waves-effect" onclick="logout()" href="#lectures">Logout</a></li>
    </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <div class="container">
  <div class="row">
  <h4> Hi, Instructor </h4>
  <div style="color:#9e9e9e" id="live-session"> To start a new live session, generate a code. </div>
  </div>
  <div class="row">
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">START LIVE SESSION</a>
  </div>
  <div id="modal1" class="modal">
    <div class="modal-content">
    <div style="color:#9e9e9e"> The students are requested to enter the code to join the session: </div>
      <div class="row offset-s1">
    <div class="col s6"> <button class="btn waves-effect waves-light nav-link" onclick="Gencode()">Generate Code</button>
    </div>
    <div class="col s6">  <p id="code" class="flow-text" style="margin:0px;"></p></div>
  </div>
  <div class="row"> 
  <div class="col s6">  <button class="btn waves-effect waves-light nav-link" onclick="timer()">Start timer</button>
         </div>     
          <div class="col s6">  <p id="demo" class="flow-text" style="margin:0px;"></p></div>
  </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </div>
    
  <div class="row" id="statistics" style="color:#9e9e9e"> Here are some statistics for the course: </div>
  


  
      <!--JavaScript at end of body for optimized loading-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>
   <div id="piechart" style="width: 900px; height: 500px;"></div>
   <div id="lectures"> </div>
      

          <!--JavaScript at end of body for optimized loading-->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          <script type="text/javascript">
           
            google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'X');
      data.addColumn('number', 'Students');
      data.addRows([
      <?php
    include("config.php");
    // Establishing connection to the database
    try {
        $msg='f';
        $conn = new PDO("pgsql:host=$servername;dbname='devhack';port=5432", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($errorMSG)){
                $stmt = $conn->prepare("select lecdate, count(*) from attendance where present='t' group by(lecdate);");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $res = $stmt->fetchAll();
                if(sizeof($res)){
                  foreach($res as $row)
                  {
                    echo " [new Date('".$row['lecdate']."'), ".$row['count']."], ";
                  }
                }               
            $conn = null;
        }
    }
    catch(PDOException $e)
    {
        print_r($e);
        $errorMSG .= "<li>There was some error fetching results from database.</li>";
        echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
    }
?>
      ]);

      var options = {
        hAxis: {
          title: 'Lecture Time'
        },
        vAxis: {
          title: 'Number of Students attended'
        },
         pointSize: 20,
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>
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
        function logout(){
          <?php session_destroy();?>
          window.location.href="index.php";
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
        $(document).ready(function(){
    $('.modal').modal();
  });
      </script>
      </div>
    </body>
  </html>