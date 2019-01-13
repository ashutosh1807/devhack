<!DOCTYPE html>
      <html>
      <?php session_start();?>
        <head>


        <title> Live Session </title>
          <!--Import Google Icon Font-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, user-scalable=no" />
      <link rel="manifest" href="manifest.json" />

    <style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
    * {
      font-family: Verdana, Arial, sans-serif;
    }
    a:link {
      color:#000;
      text-decoration: none;
    }
    a:visited {
      color:#000;
    }
    a:hover {
      color:#33F;
    }
    .button {
      background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
      border: 1px solid #076bd2;
      border-radius: 3px;
      color: #fff;
      display: none;
      font-size: 13px;
      font-weight: bold;
      line-height: 1.3;
      padding: 8px 25px;
      text-align: center;
      text-shadow: 1px 1px 1px #076bd2;
      letter-spacing: normal;
    }
    .center {
      padding: 10px;
      text-align: center;
    }
    .final {
      color: black;
      padding-right: 3px; 
    }
    .interim {
      color: gray;
    }
    .info {
      text-align: center;
      color: #777;
      display: none;
    }
    .right {
      float: right;
    }
    .sidebyside {
      display: inline-block;
      width: 45%;
      min-height: 40px;
      text-align: left;
      vertical-align: top;
    }
    #headline {
      font-size: 40px;
      font-weight: 300;
    }
    #info {
      text-align: center;
      color: #777;
      visibility: hidden;
    }
    #results {
      font-size: 14px;
      font-weight: bold;
      border: 1px solid #ddd;
      padding: 15px;
      text-align: left;
      min-height: 150px;
    }
    #start_button {
      border: 0;
      background-color:transparent;
      padding: 0;
    }
    .chat {
      width: 400px;
    }

    .bubble{
      background-color: #F2F2F2;
      border-radius: 5px;
      box-shadow: 0 0 6px #B2B2B2;
      display: inline-block;
      padding: 10px 18px;
      position: relative;
      vertical-align: top;
    }

    .bubble::before {
      background-color: #F2F2F2;
      content: "\00a0";
      display: block;
      height: 16px;
      position: absolute;
      top: 11px;
      transform:             rotate( 29deg ) skew( -35deg );
      -moz-transform:    rotate( 29deg ) skew( -35deg );
      -ms-transform:     rotate( 29deg ) skew( -35deg );
      -o-transform:      rotate( 29deg ) skew( -35deg );
      -webkit-transform: rotate( 29deg ) skew( -35deg );
      width:  20px;
    }

    .me {
      float: left;   
      margin: 5px 45px 5px 20px;         
    }

    .me::before {
      box-shadow: -2px 2px 2px 0 rgba( 178, 178, 178, .4 );
      left: -9px;           
    }

</style>


        </head>

        <body>

        <ul id="slide-out" class="sidenav">
      <li><div class="user-view">
        <div class="background">
          <img src="images/office.jpg">
        </div>
        <?php
          echo "<a href=\"#user\"><img class=\"circle\" src=\"profileimages/".$_SESSION["user"].".JPG\" ></a>" ;
          //echo "<a href=\"#user\"><img class=\"circle\" src=\"profileimages/"."160030015".".png\" ></a>" ;
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
    <div class="card">
      <div class="card-content">
        <span class="card-title">Live Lecture Transcript</span>
        <div id="info">
          <p id="info_start">Click on the microphone icon and begin speaking.</p>
          <p id="info_speak_now">Speak now.</p>
          <p id="info_no_speech">No speech was detected. You may need to adjust your
            <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
            microphone settings</a>.</p>
            <p id="info_no_microphone" style="display:none">
              No microphone was found. Ensure that a microphone is installed and that
              <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
              microphone settings</a> are configured correctly.</p>
              <p id="info_allow">Click the "Allow" button above to enable your microphone.</p>
              <p id="info_denied">Permission to use microphone was denied.</p>
              <p id="info_blocked">Permission to use microphone is blocked. To change,
              go to chrome://settings/contentExceptions#media-stream</p>
              <p id="info_upgrade">Web Speech API is not supported by this browser.
               Upgrade to <a href="//www.google.com/chrome">Chrome</a>
             version 25 or later.</p>
           </div>
           <div class="right">
            <button id="start_button" onclick="startButton(event)">
              <img id="start_img" src="mic.gif" alt="Start"></button>
            </div>
            <div id="results">
              <span id="final_span" class="final"></span>
              <span id="interim_span" class="interim"></span>
              <p>
              </div>
              <div class="center">
                <div class="sidebyside" style="text-align:right">
                  <button id="copy_button" class="button" onclick="copyButton()">
                  Copy and Paste</button>
                  <div id="copy_info" class="info">
                    Press Control-C to copy text.<br>(Command-C on Mac.)
                  </div>
                </div>
                <div class="sidebyside">
                  <button id="email_button" class="button" onclick="emailButton()">
                  Create Email</button>
                  <div id="email_info" class="info">
                    Text sent to default email application.<br>
                    (See chrome://settings/handlers to change.)
                  </div>
                </div>
                <p>
                  <div id="div_language">
                    <select  class="browser-default" id="select_language" onchange="updateCountry()"></select>
                    &nbsp;&nbsp;
                    <select  class="browser-default" id="select_dialect"></select>
                  </div>
                </div>
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

          <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Give Live Feedback</span>
          <p class="range-field">
      <input type="range"  min="0" max="100" step="10" name="myRange" id="myRange"/>
    </p>
        </div>
      </div>
    </div>
  </div>
          



        </div>
      </div>




          <!--JavaScript at end of body for optimized loading-->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          <script type="text/javascript">


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
             
             
            
             $(document).ready(function(){
                $('#myRange').click(function() {
                  var val = document.getElementById("myRange").value;
                  console.log(val);
                    $.ajax({
                        url: 'updateRatings.php',
                        type: 'POST',
                        data: {
                            name: '0',//add prof_id here
                            message: val
                        },
                        success: function(msg) {
                            M.toast({html: 'Range'});
                        }               
                    });
                });
              });

              $('.sidenav').sidenav();
              
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
          <script> 
           var langs =
      [['Afrikaans',       ['af']],
      ['Bahasa Indonesia',['id']],
      ['Bahasa Melayu',   ['ms']],
      ['Català',          ['ca']],
      ['Čeština',         ['cs']],
      ['Deutsch',         ['de']],
      ['English',         ['en', 'Australia'],
      ['en', 'Canada'],
      ['en', 'India'],
      ['en', 'New Zealand'],
      ['en', 'South Africa'],
      ['en', 'United Kingdom'],
      ['en', 'United States']],
      ['Español',         ['es', 'Argentina'],
      ['es', 'Bolivia'],
      ['es', 'Chile'],
      ['es', 'Colombia'],
      ['es', 'Costa Rica'],
      ['es', 'Ecuador'],
      ['es', 'El Salvador'],
      ],
      ['Euskara',         ['eu']],
      ['Français',        ['fr']],
      ['Galego',          ['gl']],
      ['Gujarati',       ['gu']],
      ['Hrvatski',        ['hr']],
      ['Hindi',       ['hi']],
      ['IsiZulu',         ['zu']],
      ['Íslenska',        ['is']],
      ['Italiano',        ['it', 'Italia'],
      ['it', 'Svizzera']],
      ['Kannada',       ['kn']],
      ['Magyar',          ['hu']],
      ['Nederlands',      ['nl']],
      ['Norsk bokmål',    ['nb']],
      ['Polski',          ['pl']],
      ['Português',       ['pt', 'Brasil'],
      ['pt-PT', 'Portugal']],
      ['Română',          ['ro']],
      ['Slovenčina',      ['sk']],
      ['Suomi',           ['fi']],
      ['Svenska',         ['sv']],
      ['Telugu',       ['te']],
      ['Türkçe',          ['tr']],
      ['български',       ['bg']],
      ['Pусский',         ['ru']],
      ['Српски',          ['sr']],
      ['한국어',            ['ko']],
      ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
      ['cmn-Hans-HK', '普通话 (香港)'],
      ['cmn-Hant-TW', '中文 (台灣)'],
      ['yue-Hant-HK', '粵語 (香港)']],
      ['日本語',           ['ja']],
      ['Lingua latīna',   ['la']]];

      for (var i = 0; i < langs.length; i++) {
        select_language.options[i] = new Option(langs[i][0], i);
      }
      select_language.selectedIndex = 6;
      updateCountry();
      select_dialect.selectedIndex = 6;
      showInfo('info_start');

      function updateCountry() {
        for (var i = select_dialect.options.length - 1; i >= 0; i--) {
          select_dialect.remove(i);
        }
        var list = langs[select_language.selectedIndex];
        for (var i = 1; i < list.length; i++) {
          select_dialect.options.add(new Option(list[i][1], list[i][0]));
        }
        select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
      }

      var create_email = false;
      var final_transcript = '';
      var recognizing = false;
      var ignore_onend;
      var start_timestamp;
      if (!('webkitSpeechRecognition' in window)) {
        upgrade();
      } else {
        start_button.style.display = 'inline-block';
        var recognition = new webkitSpeechRecognition();
        recognition.continuous = true;
        recognition.interimResults = true;

        recognition.onstart = function() {
          recognizing = true;
          showInfo('info_speak_now');
          start_img.src = 'mic-animate.gif';
        };

        recognition.onerror = function(event) {
          if (event.error == 'no-speech') {
            start_img.src = 'mic.gif';
            showInfo('info_no_speech');
            ignore_onend = true;
          }
          if (event.error == 'audio-capture') {
            start_img.src = 'mic.gif';
            showInfo('info_no_microphone');
            ignore_onend = true;
          }
          if (event.error == 'not-allowed') {
            if (event.timeStamp - start_timestamp < 100) {
              showInfo('info_blocked');
            } else {
              showInfo('info_denied');
            }
            ignore_onend = true;
          }
        };

        recognition.onend = function() {
          recognizing = false;
          if (ignore_onend) {
            return;
          }
          start_img.src = 'mic.gif';
          if (!final_transcript) {
            showInfo('info_start');
            return;
          }
          showInfo('');
          if (window.getSelection) {
            window.getSelection().removeAllRanges();
            var range = document.createRange();
            range.selectNode(document.getElementById('final_span'));
            window.getSelection().addRange(range);
          }
          if (create_email) {
            create_email = false;
            createEmail();
          }
        };

        recognition.onresult = function(event) {
          var interim_transcript = '';
          for (var i = event.resultIndex; i < event.results.length; ++i) {
            if (event.results[i].isFinal) {
              final_transcript += event.results[i][0].transcript;
            } else {
              interim_transcript += event.results[i][0].transcript;
            }
          }
          final_transcript = capitalize(final_transcript);
          $.ajax({
            type: "POST",
            url: "exec_beta.php",
            data: { param: final_transcript, lang : $('#select_dialect').val()},
            success: function(response){
             final_span.innerHTML = response;
           }
         });
      //final_span.innerHTML = linebreak(final_transcript);
      //interim_span.innerHTML = linebreak(interim_transcript);
      if (final_transcript || interim_transcript) {
        showButtons('inline-block');
      }
      $.ajax({
        type: "POST",
        url: "exec_beta.php",
        data: { param: interim_transcript, lang : $('#select_dialect').val()},
        success: function(response){
         interim_span.innerHTML = response;
       }
     });
    };
  }

  function logout(){
          window.location.href="index.php";
        }
  function upgrade() {
    start_button.style.visibility = 'hidden';
    showInfo('info_upgrade');
  }

  var two_line = /\n\n/g;
  var one_line = /\n/g;
  function linebreak(s) {
    return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
  }

  var first_char = /\S/;
  function capitalize(s) {
    return s.replace(first_char, function(m) { return m.toUpperCase(); });
  }

  function createEmail() {
    var n = final_transcript.indexOf('\n');
    if (n < 0 || n >= 80) {
      n = 40 + final_transcript.substring(40).indexOf(' ');
    }
    var subject = encodeURI(final_transcript.substring(0, n));
    var body = encodeURI(final_transcript.substring(n + 1));
    window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
  }

  function copyButton() {
    if (recognizing) {
      recognizing = false;
      recognition.stop();
    }
    copy_button.style.display = 'none';
    copy_info.style.display = 'inline-block';
    showInfo('');
  }

  function emailButton() {
    if (recognizing) {
      create_email = true;
      recognizing = false;
      recognition.stop();
    } else {
      createEmail();
    }
    email_button.style.display = 'none';
    email_info.style.display = 'inline-block';
    showInfo('');
  }

  function startButton(event) {
    if (recognizing) {
      recognition.stop();
      return;
    }
    final_transcript = '';
    recognition.start();
    ignore_onend = false;
    final_span.innerHTML = '';
    interim_span.innerHTML = '';
    start_img.src = 'mic-slash.gif';
    showInfo('info_allow');
    showButtons('none');
    start_timestamp = event.timeStamp;
  }

  function showInfo(s) {
    if (s) {
      for (var child = info.firstChild; child; child = child.nextSibling) {
        if (child.style) {
          child.style.display = child.id == s ? 'inline' : 'none';
        }
      }
      info.style.visibility = 'visible';
    } else {
      info.style.visibility = 'hidden';
    }
  }

  var current_style;
  function showButtons(style) {
    if (style == current_style) {
      return;
    }
    current_style = style;
    copy_button.style.display = style;
    email_button.style.display = style;
    copy_info.style.display = 'none';
    email_info.style.display = 'none';
  }
  $(document).ready(function(){
          $('.sidenav').sidenav();
          $(".modal").modal();
        });
          </script>
        </body>
      </html>