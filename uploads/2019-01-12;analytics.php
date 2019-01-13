    <!DOCTYPE html>
      <html>
      <?php session_start();?>
        <head>
          <!--Import Google Icon Font-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
        <li><a class="subheader">Important Resources</a></li>
        <li><a class="waves-effect" href="files/2016-timetable.pdf">Timetable</a></li>
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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>
   <div id="piechart" style="width: 900px; height: 500px;"></div>
      

          <!--JavaScript at end of body for optimized loading-->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Average Rating', 'Number of Lectures'],
          ['< 1',     11],
          ['< 2',      2],
          ['< 3',  2],
          ['< 4', 2],
          ['< 5',    7]
        ]);

        var options = {
          title: 'Lecture Feedback',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
            google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'X');
      data.addColumn('number', 'Students');

      data.addRows([
        [new Date("Wed Oct 18 2017 12:41"), 5],
        [new Date("Wed Oct 19 2017 12:41"), 6],
        [new Date("Wed Oct 20 2017 12:41"), 7],
        [new Date("Wed Oct 21 2017 12:41"), 8],
        [new Date("Wed Oct 22 2017 12:41"), 5],
        [new Date("Wed Oct 23 2017 12:41"), 2],
        [new Date("Wed Oct 24 2017 12:41"), 4]
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
             $(document).ready(function(){
        $('.sidenav').sidenav();
      });
             $('#submit').click(function() {
              if($.trim($('#submit_question').val()).length>0){
                var name = "Tom";
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
        });}
        else{
           M.toast({html: 'Please enter something to submit question.'});
        }
    });
        
            
          </script>
        </body>
      </html>