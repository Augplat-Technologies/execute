<!--
Add Left nav, Top nav and side Nav,Footer. link
css/custom.css and load "onload="load()" from body tag
-->
<!-- start: app-content -->
<section id="app-content">
                
    <div class="content-body">
        
        <div class="page-header">
            <h2>Google Analytics <section id="auth-button"></section></h2>
        </div>
        <div class="container-body">
            <div class="grid">
                <div class="block">
                   <div class="card">
                       <section id="view-selector"></section>
                   </div> 
                </div>
                <div class="block" id="date">
                   <div class="card">
                            <form class="form-inline" action ="" method ="post">
                                  <label for="start-date">Start Date:</label>
                                  <input type="date" id="start-date" name="sdate" required>
                                  <label for="end-date">End-date:</label>
                                  <input type="date" id="end-date" name="edate" required>
                                  <button type="submit">Submit</button>
                            </form>
                   </div> 
                </div>
                <div class="block" id="menu-bar">
                    <div class="card">
                          
                        <div class="scrollmenu">
                              <button id="users" class="btn btn-success">Users</button>
                              <button id="sessions" class="btn">Sessions</button>
                              <button id="bouncerate" class="btn">Bounce Rate</button>
                              <button id="sessionduration" class="btn">Session Duration</button>
                              <button id="sessionbycountry" class="btn">Sessions by country</button>
                              <button id="sessionbydevice" class="btn">Sessions by device</button>
                              <button id="sourceormedium" class="btn">Source/Medium</button>  
                              <button id="page" class="btn">Pages</button>
                        </div>
                        <!--Storing Dates to  Variables-->
                         <?php
	                    //posted values	
                        $sdate =isset($_POST['sdate'])? $_POST['sdate']:'30daysAgo';
	                    $edate =isset($_POST['edate'])? $_POST['edate']: 'yesterday';
	                    ?>  
	                    
                    </div>
                </div>
                <div class="block" id ="0">
                    <div class="card scrollmenu">
                        <div id ="timeline"></div>
                    </div>
                </div>
                <div class="block" id ="1">
                    <div class="card scrollmenu">
                        <div id ="timeline1"></div>
                    </div>
                </div>
                <div class="block" id ="2">
                    <div class="card scrollmenu">
                        <div id ="timeline2"></div>
                    </div>
                </div>
                <div class="block" id ="3">
                    <div class="card scrollmenu">
                        <div id ="timeline3"></div>
                    </div>
                </div>
                <div class="block" id ="4">
                    <div class="card scrollmenu">
                        <div id ="timeline4"></div>
                    </div>
                </div>
                <div class="block" id ="5">
                    <div class="card scrollmenu">
                        <div id ="timeline5"></div>
                    </div>
                </div>
                <div class="block" id ="6">
                    <div class="card scrollmenu">
                        <div id ="timeline6"></div>
                    </div>
                </div>
                <div class="block" id ="7">
                    <div class="card scrollmenu">
                        <div id ="timeline7"></div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

</section>
<!-- Step 2: Load the library. -->

<script>
(function(w,d,s,g,js,fjs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
}(window,document,'script'));
</script>

<script>
gapi.analytics.ready(function() {

  // Step 3: Authorize the user.

  var CLIENT_ID = '96460410346-tkstpkrvonm85qvt6jhpujf5m8f77d7i.apps.googleusercontent.com';

  gapi.analytics.auth.authorize({
    container: 'auth-button',
    clientid: CLIENT_ID,
  });
// Step 4: Create the view selector.

  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector'
  });

 // Step 5: Create the timeline chart.
//users
  var timeline = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:users',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'LINE',
      container: 'timeline',
      options: {
          legend: { position: 'none' },
          width: 1000,
        height: 450,
      }
    }
  });
 //sessions
   var timeline1 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:sessions',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'LINE',
      container: 'timeline1',
      options: {
          legend: { position: 'none' },
          width: 1000,
        height: 450,
      }
    }
  });
//bounce rate
 var timeline2 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:bounceRate',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'LINE',
      container: 'timeline2',
      options: {
          legend: { position: 'none' },
          width: 1000,
        height: 450,
        vAxis: {
        format: '#\'%\'',
        }
      }
    }
  });
 //session duration
 var timeline3 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:sessionDuration',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'LINE',
      container: 'timeline3',
      options: {
          legend: { position: 'none' },
          width: 1000,
        height: 450,
      }
    }
  });
  
  //sessions by country
  
   var timeline4 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:country',
      'metrics': 'ga:sessions',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'GEO',
      container: 'timeline4',
      options:{
          width: 1000,
        height: 450,
      }
    }
  });
  
  //Sessions by device
  
  var timeline5 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:deviceCategory',
      'metrics': 'ga:sessions',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'PIE',
      container: 'timeline5',
      options: {
          pieHole: 0.6,
          width: 1200,
        height: 500,
      }
    }
  });
  
    var timeline6 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:organicSearches',
       'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'COLUMN',
      container: 'timeline6',
      options: {
        width: 1000,
        height: 450,
        legend: { position: "none" },
        bar: { groupWidth: '80%' },
        isStacked: true,
        
      }
    }
  });
   var timeline7 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:pageviews',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'LINE',
      container: 'timeline7',
      options: {
          legend: { position: 'none' },
          width: 1000,
        height: 450,
      }
    }
  });
  
  
  
  // Step 6: Hook up the components to work together.

  gapi.analytics.auth.on('success', function(response) {
    viewSelector.execute();
  });

  viewSelector.on('change', function(ids) {
    var newIds = {
      query: {
        ids: ids
      }
    }
    timeline.set(newIds).execute();
    timeline1.set(newIds).execute();
     timeline2.set(newIds).execute(); 
     timeline3.set(newIds).execute();
     timeline4.set(newIds).execute();
     timeline5.set(newIds).execute();
     timeline6.set(newIds).execute();
     timeline7.set(newIds).execute();
  });
});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type "text/javascript">
    function load()
    {
        $('#1').hide();
        $('#2').hide();
        $('#3').hide();
        $('#4').hide();
        $('#5').hide();
        $('#6').hide();
        $('#7').hide();
    }
$('#users').on('click',function(){
    $('#0').show();
    $('#1').hide();
    $('#2').hide();
    $('#3').hide();
    $('#4').hide();
    $('#5').hide();
    $('#6').hide();
    $('#7').hide();
    $('#users').removeClass('btn btn-success').addClass('btn btn-success');
    $('#sessions').removeClass('btn btn-success').addClass('btn');
    $('#bouncerate').removeClass('btn btn-success').addClass('btn');
    $('#sessionduration').removeClass('btn btn-success').addClass('btn');
    $('#sessionbycountry').removeClass('btn btn-success').addClass('btn');
    $('#sessionbydevice').removeClass('btn btn-success').addClass('btn');
    $('#sourceormedium').removeClass('btn btn-success').addClass('btn');
    $('#page').removeClass('btn btn-success').addClass('btn');
});
$('#sessions').on('click',function(){
    $('#0').hide();
    $('#1').show();
    $('#2').hide();
    $('#3').hide();
    $('#4').hide();
    $('#5').hide();
    $('#6').hide();
    $('#7').hide();
    $('#sessions').removeClass('btn btn-success').addClass('btn btn-success');
    $('#users').removeClass('btn btn-success').addClass('btn');
    $('#bouncerate').removeClass('btn btn-success').addClass('btn');
    $('#sessionduration').removeClass('btn btn-success').addClass('btn');
    $('#sessionbycountry').removeClass('btn btn-success').addClass('btn');
    $('#sessionbydevice').removeClass('btn btn-success').addClass('btn');
    $('#sourceormedium').removeClass('btn btn-success').addClass('btn');
    $('#page').removeClass('btn btn-success').addClass('btn');
});
$('#bouncerate').on('click',function(){
    $('#0').hide();
    $('#1').hide();
    $('#2').show();
    $('#3').hide();
    $('#4').hide();
    $('#5').hide();
    $('#6').hide();
    $('#7').hide();
    $('#bouncerate').removeClass('btn btn-success').addClass('btn btn-success');
    $('#users').removeClass('btn btn-success').addClass('btn');
    $('#sessions').removeClass('btn btn-success').addClass('btn');
    $('#sessionduration').removeClass('btn btn-success').addClass('btn');
    $('#sessionbycountry').removeClass('btn btn-success').addClass('btn');
    $('#sessionbydevice').removeClass('btn btn-success').addClass('btn');
    $('#sourceormedium').removeClass('btn btn-success').addClass('btn');
    $('#page').removeClass('btn btn-success').addClass('btn');
});
$('#sessionduration').on('click',function(){
    $('#0').hide();
    $('#1').hide();
    $('#2').hide();
    $('#3').show();
    $('#4').hide();
    $('#5').hide();
    $('#6').hide();
    $('#7').hide();
    $('#sessionduration').removeClass('btn btn-success').addClass('btn btn-success');
    $('#users').removeClass('btn btn-success').addClass('btn');
    $('#sessions').removeClass('btn btn-success').addClass('btn');
    $('#bouncerate').removeClass('btn btn-success').addClass('btn');
    $('#sessionbycountry').removeClass('btn btn-success').addClass('btn');
    $('#sessionbydevice').removeClass('btn btn-success').addClass('btn');
    $('#sourceormedium').removeClass('btn btn-success').addClass('btn');
    $('#page').removeClass('btn btn-success').addClass('btn');
});
$('#sessionbycountry').on('click',function(){
    $('#0').hide();
    $('#1').hide();
    $('#2').hide();
    $('#3').hide();
    $('#4').show();
    $('#5').hide();
    $('#6').hide();
    $('#7').hide();
    $('#sessionbycountry').removeClass('btn btn-success').addClass('btn btn-success');
    $('#users').removeClass('btn btn-success').addClass('btn');
    $('#sessions').removeClass('btn btn-success').addClass('btn');
    $('#bouncerate').removeClass('btn btn-success').addClass('btn');
    $('#sessionduration').removeClass('btn btn-success').addClass('btn');
    $('#sessionbydevice').removeClass('btn btn-success').addClass('btn');
    $('#sourceormedium').removeClass('btn btn-success').addClass('btn');
    $('#page').removeClass('btn btn-success').addClass('btn');
});
$('#sessionbydevice').on('click',function(){
    $('#0').hide();
    $('#1').hide();
    $('#2').hide();
    $('#3').hide();
    $('#4').hide();
    $('#5').show();
    $('#6').hide();
    $('#7').hide();
    $('#sessionbydevice').removeClass('btn btn-success').addClass('btn btn-success');
    $('#users').removeClass('btn btn-success').addClass('btn');
    $('#sessions').removeClass('btn btn-success').addClass('btn');
    $('#bouncerate').removeClass('btn btn-success').addClass('btn');
    $('#sessionduration').removeClass('btn btn-success').addClass('btn');
    $('#sessionbycountry').removeClass('btn btn-success').addClass('btn');
    $('#sourceormedium').removeClass('btn btn-success').addClass('btn');
    $('#page').removeClass('btn btn-success').addClass('btn');
});
$('#sourceormedium').on('click',function(){
    $('#0').hide();
    $('#1').hide();
    $('#2').hide();
    $('#3').hide();
    $('#4').hide();
    $('#5').hide();
    $('#6').show();
    $('#7').hide();
    $('#sourceormedium').removeClass('btn btn-success').addClass('btn btn-success');
    $('#users').removeClass('btn btn-success').addClass('btn');
    $('#sessions').removeClass('btn btn-success').addClass('btn');
    $('#bouncerate').removeClass('btn btn-success').addClass('btn');
    $('#sessionduration').removeClass('btn btn-success').addClass('btn');
    $('#sessionbycountry').removeClass('btn btn-success').addClass('btn');
    $('#sessionbydevice').removeClass('btn btn-success').addClass('btn');
    $('#page').removeClass('btn btn-success').addClass('btn');
});
$('#page').on('click',function(){
    $('#0').hide();
    $('#1').hide();
    $('#2').hide();
    $('#3').hide();
    $('#4').hide();
    $('#5').hide();
    $('#6').hide();
    $('#7').show();
    $('#page').removeClass('btn btn-success').addClass('btn btn-success');
    $('#users').removeClass('btn btn-success').addClass('btn');
    $('#sessions').removeClass('btn btn-success').addClass('btn');
    $('#bouncerate').removeClass('btn btn-success').addClass('btn');
    $('#sessionduration').removeClass('btn btn-success').addClass('btn');
    $('#sessionbycountry').removeClass('btn btn-success').addClass('btn');
    $('#sessionbydevice').removeClass('btn btn-success').addClass('btn');
    $('#sourceormedium').removeClass('btn btn-success').addClass('btn');
});
</script>
</body>
</html>