<!--
Add Left nav, Top nav and side Nav,Footer. link
css/custom.css and load "onload="load()" from body tag
-->
<!-- start: app-content -->
<section id="app-content">
                
    <div class="content-body">
        
        <div class="page-header">
            <h2>Google Adwords <section id="auth-button"></section></h2>
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
        <button id ="clicks" class="btn btn-success">Clicks</button>
	    <button id ="impressions" class="btn ">Impressions</button>
	    <button id ="costperconv" class="btn">Cost / Conv</button>
	    <button id ="cost" class="btn">Cost</button>
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
  
  //Adwords
  //adclicks
     var timeline = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:adClicks',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'LINE',
      container: 'timeline',
      options: {
          /*legend: { position: 'none' },*/
          width: 1000,
        height: 450,
      }
    }
  });
  
  //impressions
     var timeline1 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:impressions',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'LINE',
      container: 'timeline1',
      options: {
          /*legend: { position: 'none' },*/
          width: 1000,
        height: 450,
      }
    }
  });
  
    //Cost Per Conversion
     var timeline2 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:costPerConversion',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'LINE',
      container: 'timeline2',
      options: {
          /*legend: { position: 'none' },*/
          width: 1000,
        height: 450,
      }
    }
  });
  
  //Cost
     var timeline3 = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:adCost',
      'start-date': '<?php echo $sdate;?>',
      'end-date': '<?php echo $edate;?>',
    },
    chart: {
      type: 'LINE',
      container: 'timeline3',
      options: {
          /*legend: { position: 'none' },*/
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
    }
$('#clicks').on('click',function(){
    $('#0').show();
    $('#1').hide();
    $('#2').hide();
    $('#3').hide();
    $('#clicks').removeClass('btn btn-success').addClass('btn btn-success');
    $('#impressions').removeClass('btn btn-success').addClass('btn');
    $('#costperconv').removeClass('btn btn-success').addClass('btn');
    $('#cost').removeClass('btn btn-success').addClass('btn');
}); 
$('#impressions').on('click',function(){
    $('#0').hide();
    $('#1').show();
    $('#2').hide();
    $('#3').hide();
    $('#clicks').removeClass('btn btn-success').addClass('btn');
    $('#impressions').removeClass('btn btn-success').addClass('btn btn-success');
    $('#costperconv').removeClass('btn btn-success').addClass('btn');
    $('#cost').removeClass('btn btn-success').addClass('btn');
});
$('#costperconv').on('click',function(){
    $('#0').hide();
    $('#1').hide();
    $('#2').show();
    $('#3').hide();
    $('#clicks').removeClass('btn btn-success').addClass('btn');
    $('#impressions').removeClass('btn btn-success').addClass('btn');
    $('#costperconv').removeClass('btn btn-success').addClass('btn btn-success');
    $('#cost').removeClass('btn btn-success').addClass('btn');
});
$('#cost').on('click',function(){
    $('#0').hide();
    $('#1').hide();
    $('#2').hide();
    $('#3').show();
    $('#clicks').removeClass('btn btn-success').addClass('btn');
    $('#impressions').removeClass('btn btn-success').addClass('btn');
    $('#costperconv').removeClass('btn btn-success').addClass('btn');
    $('#cost').removeClass('btn btn-success').addClass('btn btn-success');
});
</script>
</body>
</html>