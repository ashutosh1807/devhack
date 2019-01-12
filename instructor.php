  <!DOCTYPE html>
    <html>
      <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>
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
        <a href="#user"><img class="circle" src="yuna.jpg"></a>
        <a href="#name"><span class="white-text name">John Doe</span></a>
        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
      </div></li>
      <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
      <li><a href="#!">Second Link</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Subheader</a></li>
      <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
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
      <select id="select_language" onchange="updateCountry()"></select>
      &nbsp;&nbsp;
      <select id="select_dialect"></select>
    </div>
  </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6">
        <div class="card large">
          <div class="card-content" style="overflow:auto;" id='questions'>
            <span class="card-title">Student Questions</span>
          </div> 
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
  <script>
  var langs =
  [['Afrikaans',       ['af-ZA']],
   ['Bahasa Indonesia',['id-ID']],
   ['Bahasa Melayu',   ['ms-MY']],
   ['Català',          ['ca-ES']],
   ['Čeština',         ['cs-CZ']],
   ['Deutsch',         ['de-DE']],
   ['English',         ['en-AU', 'Australia'],
                       ['en-CA', 'Canada'],
                       ['en-IN', 'India'],
                       ['en-NZ', 'New Zealand'],
                       ['en-ZA', 'South Africa'],
                       ['en-GB', 'United Kingdom'],
                       ['en-US', 'United States']],
   ['Español',         ['es-AR', 'Argentina'],
                       ['es-BO', 'Bolivia'],
                       ['es-CL', 'Chile'],
                       ['es-CO', 'Colombia'],
                       ['es-CR', 'Costa Rica'],
                       ['es-EC', 'Ecuador'],
                       ['es-SV', 'El Salvador'],
                       ['es-ES', 'España'],
                       ['es-US', 'Estados Unidos'],
                       ['es-GT', 'Guatemala'],
                       ['es-HN', 'Honduras'],
                       ['es-MX', 'México'],
                       ['es-NI', 'Nicaragua'],
                       ['es-PA', 'Panamá'],
                       ['es-PY', 'Paraguay'],
                       ['es-PE', 'Perú'],
                       ['es-PR', 'Puerto Rico'],
                       ['es-DO', 'República Dominicana'],
                       ['es-UY', 'Uruguay'],
                       ['es-VE', 'Venezuela']],
   ['Euskara',         ['eu-ES']],
   ['Français',        ['fr-FR']],
   ['Galego',          ['gl-ES']],
   ['Hrvatski',        ['hr_HR']],
   ['IsiZulu',         ['zu-ZA']],
   ['Íslenska',        ['is-IS']],
   ['Italiano',        ['it-IT', 'Italia'],
                       ['it-CH', 'Svizzera']],
   ['Magyar',          ['hu-HU']],
   ['Nederlands',      ['nl-NL']],
   ['Norsk bokmål',    ['nb-NO']],
   ['Polski',          ['pl-PL']],
   ['Português',       ['pt-BR', 'Brasil'],
                       ['pt-PT', 'Portugal']],
   ['Română',          ['ro-RO']],
   ['Slovenčina',      ['sk-SK']],
   ['Suomi',           ['fi-FI']],
   ['Svenska',         ['sv-SE']],
   ['Türkçe',          ['tr-TR']],
   ['български',       ['bg-BG']],
   ['Pусский',         ['ru-RU']],
   ['Српски',          ['sr-RS']],
   ['한국어',            ['ko-KR']],
   ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                       ['cmn-Hans-HK', '普通话 (香港)'],
                       ['cmn-Hant-TW', '中文 (台灣)'],
                       ['yue-Hant-HK', '粵語 (香港)']],
   ['日本語',           ['ja-JP']],
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
    url: "exec.php",
    data: { param: final_transcript},
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
    url: "exec.php",
    data: { param: interim_transcript},
     success: function(response){
             interim_span.innerHTML = response;
          }
  });
    };
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
    recognition.lang = select_dialect.value;
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
  function loadPosts(){
    $.ajax({
      url: 'new_questions.txt',
      success: function(data) {
        var lines = data.split('\n');
        var content="";
for(var i = 0;i < lines.length-1;i++){
  var index = lines[i].indexOf(' ');
  var name = lines[i].substring(0, index);
  var message = lines[i].substring(index+1);
    $("#questions").append('<div class="row s12"><div class="col s12"><div class="card-panel z-depth-1" style="padding:8px;"><div class="row valign-wrapper"><div class="col" style="margin-left:0px;""><b>' + name+'</b></div><div class="col"><span class="black-text">'+message+'</span></div></div></div></div></div> ');
}
if(lines.length > 1)
$("#questions").scrollTop($("#questions")[0].scrollHeight);
 $.ajax({
        url: 'clear_questions.php',
        type: 'POST',           
    });
        setTimeout("loadPosts()", 1000);
      }
    });
  }
   $.ajax({
      url: 'questions.txt',
      success: function(data) {
        var lines = data.split('\n');
        var content="";
for(var i = 0;i < lines.length-1;i++){
  var index = lines[i].indexOf(' ');
  var name = lines[i].substring(0, index);
  var message = lines[i].substring(index+1);
    $("#questions").append('<div class="row s12"><div class="col s12"><div class="card-panel z-depth-1" style="padding:8px;"><div class="row valign-wrapper"><div class="col" style="margin-left:0px;""><b>' + name+'</b></div><div class="col"><span class="black-text">'+message+'</span></div></div></div></div></div> ');
}
if(lines.length > 1)
$("#questions").scrollTop($("#questions")[0].scrollHeight);
 }
    });
  $(function(){
    loadPosts();
  });
  </script>
      </body>
    </html>