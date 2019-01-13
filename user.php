    <!DOCTYPE html>
      <html>
      <?php session_start();
        print_r($_SESSION);
      ?>
        <head>
        <title> Live Session </title>
          <!--Import Google Icon Font-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, user-scalable=no" />
      <link rel="manifest" href="manifest.json" />
        </head>

        <body>

      <ul id="slide-out" class="sidenav">
        <li><div class="user-view">
          <div class="background">
            <img src="images/office.jpg">
          </div>
          <?php
          //echo "<a href=\"#user\"><img class=\"circle\" src=\"profileimages/".$_session["user"].".png\" ></a>" ;
          echo "<a href=\"#user\"><img class=\"circle\" src=\"profileimages/"."160030015".".png\" ></a>" ;
          ?>
          <!--<a href="#user"><img class="circle" src="yuna.jpg"></a> -->
          <a href="#name"><span class="white-text name">John Doe</span></a>
          <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div></li>
        <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
        <li><a href="#!">Second Link</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Important Resources</a></li>
        <li><a class="waves-effect" href="files/2016-timetable.pdf">Timetable</a></li>
        <li><a class="waves-effect" onclick="logout()" href="#lectures">Logout</a></li>
      </ul>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <div>
   <script>
    (function() {
      var cx = '018427458728593593842:yxpdlc3tiji';
      var gcse = document.createElement('script');
      gcse.type = 'text/javascript';
      gcse.async = true;
      gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(gcse, s);
    })();
  </script>
  <gcse:search></gcse:search>
  </div>
        <div class="row">
        <div class="col s12 m6">
          <div class="card large">
            <div class="card-content">
              <span class="card-title">Live Lecture Transcript</span>
              <span id='translate'>
                <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
              </span>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Ask a Question?</span>
              <div class="row">
              <div class="input-field col s12">
                <textarea id="submit_question" class="materialize-textarea" data-length="120"></textarea>
                <label for="textarea2">Your Question Here</label>
              </div>
            </div>
            <div class="row">
              <div class="col s6">
                <div class="switch">
        <label>
          Submit Anonymously
          <input type="checkbox" id="submit-anonymously">
          <span class="lever"></span>
        </label>
      </div>
              </div>
              <div class="col s6"> 
              <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Submit
        <i class="material-icons right">send</i>
      </button>
              </div>
            </div> 
           </div>
          </div>
        </div>
      </div>


 
      <br><br>
      <div>
        <form action="opendir.php" method="post">
         <!--  <button type="button" onclick= functiontoopenfolder()> Open Folder </button> -->
         Download Files
         <input type="submit" class="btn btn-primary"  value="Download Files" name="Files"> 
        </form>
      </div>


          <!--JavaScript at end of body for optimized loading-->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          <script type="text/javascript">
          function logout(){
          window.location.href="index.php";
        }
             $(document).ready(function(){
      
              $('.sidenav').sidenav();
              var req = function Update() {
                  $.ajax({
                  type: "POST",
                  url: "./user_fetch.php",
                  dataType: "json",
                  success : function(data){
                    if (data.code == "100"){ // Everything went well
                      translate_element = document.getElementById('translate');
                      translate_element.innerHTML = data.data;
                    }
                    else if(data.code=="200"){ // Error occured
                      translate_element = document.getElementById('translate');
                      translate_element.innerHTML = 'Error occured, please contact admin!'
                    }
                  }
                });
              } 
              
            setInterval(req, 100)
          });
             $('#submit').click(function() {
              if($.trim($('#submit_question').val()).length>0){

                var name = "<?php echo $_SESSION['name'];?>";
                name = name.split(" ")[0];
                if($('#submit-anonymously').prop('checked'))
                  name = "Anonymous";
        $.ajax({
            url: 'submit_question.php',
            type: 'POST',
            data: {
                name: name,
                message: $('#submit_question').val()
            },
            success: function(msg) {
               M.toast({html: 'Your Question has been submitted.'});
            }               
        });
        
      }
        else{
           M.toast({html: 'Please enter something to submit question.'});
        }


        
    });
        
            
          </script>
        </body>
      </html>