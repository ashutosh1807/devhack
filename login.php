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
  <style>
  </style>
    <body>
      <div class="row">
        <div class="col s12 m6">
            <div class="card mx-auto">
              <div class="card-content">
                  <span class="card-title">Login</span>
                  <form  id="login" action="">
                    <div class="row">
                      <div class="input-field col s12">
                          <input type="text" id="user" class="materialize-textarea" required >
                          <label for="user">User</label>
                      </div>
                      <div class="input-field col s12">
                          <input type="password" id="pass" required  class="materialize-textarea" >
                          <label for="pass">Password</label>
                      </div>
                    </div>
                    <div class="row" id="error">
                    </div>
                    </form>
                    <div class="row">
                      <div class="col s6"> 
                        <button class="btn waves-effect waves-light" id ="loginbtn" type="submit" name="action">Login
                        <i class="material-icons right">send</i>
                        </button>
                      </div>
                    </div>
                  
              </div>
            </div>
        </div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script>
      $('#loginbtn').click(function(e){
				var form = $("#login")
				//alert()
				if (form[0].checkValidity() === false) {
					form[0].reportValidity();
				}
				else{
					document.getElementById('error').innerHTML='';
					var uname = $("#user").val();
					var pass = $("#pass").val();
					$.ajax({
						type: "POST",
						url: "./loginProcess.php",
						dataType: "json",
						data: {user:uname,pass:pass},
						success : function(data){
							if (data.code == "100"){
                window.location.href="studentinit.php";
							}
							else if(data.code=="200"){
                window.location.href="instructorinit.php";
							}
              else if(data.code=="300"){
                document.getElementById('error').innerHTML='Invalid Credentials';
              }
						}
					});
				}
			});
      </script>
    </body>
  </html>