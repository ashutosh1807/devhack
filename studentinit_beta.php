<!DOCTYPE html>
  <html>
    <head>
     <script type="text/javascript" src="src/grid.js"></script>
    <script type="text/javascript" src="src/version.js"></script>
    <script type="text/javascript" src="src/detector.js"></script>
    <script type="text/javascript" src="src/formatinf.js"></script>
    <script type="text/javascript" src="src/errorlevel.js"></script>
    <script type="text/javascript" src="src/bitmat.js"></script>
    <script type="text/javascript" src="src/datablock.js"></script>
    <script type="text/javascript" src="src/bmparser.js"></script>
    <script type="text/javascript" src="src/datamask.js"></script>
    <script type="text/javascript" src="src/rsdecoder.js"></script>
    <script type="text/javascript" src="src/gf256poly.js"></script>
    <script type="text/javascript" src="src/gf256.js"></script>
    <script type="text/javascript" src="src/decoder.js"></script>
    <script type="text/javascript" src="src/qrcode.js"></script>
    <script type="text/javascript" src="src/findpat.js"></script>
    <script type="text/javascript" src="src/alignpat.js"></script>
	<script type="text/javascript" src="src/databr.js"></script>
	<script type="text/javascript" src="src/needed.js"></script>
    <title> Student Dashboard </title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, user-scalable=no" />
      <link rel="manifest" href="manifest.json" />
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

    <body>
    <?php  session_start(); 
   /* if( !isset($_SESSION["user"]) ){
      header('Location: index.php'); 
    }


    */
    
    ?>
    
  <ul id="slide-out" class="sidenav">
      <li><div class="user-view">
        <div class="background">
          <img src="images/office.jpg">
        </div>
        <?php
          echo "<a href=\"#user\"><img class=\"circle\" src=\"profileimages/".$_SESSION["user"].".jpg\" ></a>" ;
        ?>
        <!--<a href="#user"><img class="circle" src="yuna.jpg"></a> -->
        <a href="#name"><span class="white-text name"><?php echo $_SESSION['name']?></span></a>
        <a href="#email"><span class="white-text email"><?php echo $_SESSION['user']?>@iitdh.ac.in</span></a>
      </div></li>
      <li><a class="modal-trigger waves-effect" href="#uploadmodal">Upload photo</a></li>
      <li><div class="divider"></div></li>
      <li><a class="waves-effect" href="studentinit_beta.php">Important Resources</a></li>
        <li><a class="waves-effect" href="files/2016-timetable.pdf">Timetable</a></li>
      <li><a class="waves-effect" onclick="logout()" href="#lectures">Logout</a></li>

    </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <div id="uploadmodal" class="modal">
    <div class="modal-content">
      <h4>Upload Photo</h4>
      <div class="row">
          <form action="uploadprofile.php" method="post" enctype="multipart/form-data">
          <input type="file" name="fileToUpload" id="fileToUpload">
          <input type="submit" class="btn btn-primary"  value="Upload Image" name="submit">
           </form>
       </div>
      
    </div>
    </div>

    <div class="row s12">
    <div class="col s12 m6 offset-m3">
      <div class="card large" style="height:900px;">
        <div class="card-content" style="overflow:auto;">
          <span class="card-title">Hi, Student</span>
          <div class="progress">
          <?php
        $id=$_SESSION['user'];
    include("config.php");
    // Establishing connection to the database
    try {
        $msg='f';
        $conn = new PDO("pgsql:host=$servername;dbname='devhack';port=5432", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($errorMSG)){
                $stmt = $conn->prepare("select count(*) from attendance where present='t' and userid = :id;");
                $stmt->execute([ ':id' => $id]);
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $res = $stmt->fetchAll();
                if(sizeof($res)){
                  $count = $res[0]['count'];
                  $stmt = $conn->prepare("select count(distinct lecdate) from attendance;");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $res = $stmt->fetchAll();
                $total = $res[0]['count'];
                  $percent = ($count / $total) * 100;
                  echo '<div class="determinate" style="width:'.$percent.'%"></div>
                  </div>
                  <div class="row right" style="color:#9e9e9e"> Your attendance is '.$percent.'%. </div>';                                  
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
      
<!-- Modal -->
<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Enter live</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Type Code</h4>
      <div class="row">
            <div class="input-field col s12">
                            <input type="text" id="code" required >
                            <label for="user">Code</label>
            </div>
      </div>

      <div class="row">

            <div class="video-container" >
		        <video id="video-preview"></video>
		        <canvas id="qr-canvas" class="hidden" ></canvas>
	        </div>
      </div>
      
    </div>
    <div class="modal-footer">
    
      <button class=" waves-effect waves-green btn-flat" onclick="submit()">Continue</a>
    </div>
  </div>
<h4>Lecture Slides and Transcripts</h4>
<!-- Modal -->
<?php
$dir = "uploads/";

$allFiles = scandir($dir);
$files = array_diff($allFiles, array('.', '..')); 
$currentdate = 1998-01-01 ;

echo " <div class=\"row\" > ";
echo " <div class=\"card \" > ";
echo "<div class=\"card-content\"> ";
foreach($files as $file){
    $temp = explode(";", $file);
    $date = $temp[0];
    $name = $temp[1];
    if($date == $currentdate ){
        echo " <a href='download.php?file=".$file."'>".$name."</a><br>" ;
    }
    else{
        $currentdate = $date ;
        echo "  <span class=\"card-title\">".$date."</span><hr> " ;
        echo " <a href='download.php?file=".$file."'>".$name."</a><br>" ;
    }
}
echo " </div></div></div>" ;

?>


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
          $(".modal").modal();
        });
        function logout(){
          $.ajax({
            url: 'logout.php',
            dataType: 'json',
            success: function(data) {
              if(data.code == 200){
                window.location.href = "/devhack/index.php"
              }
            }
          });
        }
        function submit(result){
          
          var test=document.getElementById('code').value;
          if(test==''){

            $.ajax({
                url: 'codecheck.php',
                type: 'POST',
                dataType: "json",
                data: {
                    message: result
                },
                success : function(data){
                if (data.code == "100"){
                    swal("Attendance done!", "Be regular like this!", "success");
                    
                    setTimeout(function(){ window.location.href="user_beta.php"; }, 2000);
                }
                else if(data.code=="200"){
                    swal("Wrong!", "Please try again!", "warning");

                }
                else if(data.code=="400"){
                    swal("Attendance over!", "Meet me!", "error");
                    
                    setTimeout(function(){ window.location.href="user_beta.php"; }, 2000);
                }
                }            
            });
          
          }
          else{
      
            $.ajax({
                        url: 'codecheck.php',
                        type: 'POST',
                        dataType: "json",
                        data: {
                            message: document.getElementById('code').value
                        },
                        success : function(data){
                          if (data.code == "100"){
                            swal("Attendance done!", "Be regular like this!", "success");
                            
                            setTimeout(function(){ window.location.href="user_beta.php"; }, 2000);
                          }
                          else if(data.code=="200"){
                            swal("Wrong!", "Please try again!", "warning");

                          }
                          else if(data.code=="400"){
                            swal("Attendance over!", "Meet me!", "error");
                            
                            setTimeout(function(){ window.location.href="user_beta.php"; }, 2000);
                          }
                        }            
                    });
           }
                  
            
        }
        function funct1(){
      //     <div >Upload your profile photo
      //     <form action="uploadprofile.php" method="post" enctype="multipart/form-data">
      //     <input type="file" name="fileToUpload" id="fileToUpload">
      //     <input type="submit" class="btn btn-primary"  value="Upload Image" name="submit">
      //     </form>
      // </div>
        }
        
      </script>
    </body>
  </html>