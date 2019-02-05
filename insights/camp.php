<!-- Php Code for Connection and querying start -->
<?php    
include('conn.php');
$campid = $_GET['id']; /*Camapign ID*/
 /* Start Listing All the Campaigns */
 $sql = "SELECT * 
  FROM mau1u_campaigns
 WHERE id ='$campid'";
 $result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
 if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
         $cname = $row['name'];
     }
 }
/* Querying For Leadlist id based on Campaign ID */
$sql2 = "SELECT * 
        FROM mau1u_campaign_leadlist_xref
        WHERE campaign_id = '$campid'";
$result2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                while($row1 = mysqli_fetch_assoc($result2)) {
                    $leadlistid[] = $row1['leadlist_id'];
                }
} else {
    echo "";
}
$a = "SELECT count(lead_id) as mno
         FROM mau1u_lead_lists_leads
         WHERE leadlist_id IN('".implode("','",$leadlistid)."')";
$b= mysqli_query($conn, $a);
while($rs = mysqli_fetch_assoc($b)) {
                    $qwe = $rs['mno'];
                }

/*Querying Leadlist Names based on Leadlist*/
$sql3 = "SELECT * 
        FROM mau1u_lead_lists
        WHERE id IN('".implode("','",$leadlistid)."')";
$result3 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($result3) > 0) {
                // output data of each row
                while($row3 = mysqli_fetch_assoc($result3)) {
                    $leadlistname[] = $row3['name'];
                }
} else {
    echo "";
}
/*Querying for Channel Id based on  campaign id and channel name */
$sql4 = "SELECT DISTINCT (channel_id)
        FROM mau1u_campaign_events
        where campaign_id = '$campid' AND channel ='email'  ";
$result4 = mysqli_query($conn, $sql4);
if (mysqli_num_rows($result4) > 0) {
                // output data of each row
                while($row4 = mysqli_fetch_assoc($result4)) {
                    $channelid[] = $row4['channel_id'];
                }
} else {
    echo "";
}

/*Query For Landing Page ids*/
$sql6 = "SELECT DISTINCT (channel_id)
        FROM mau1u_campaign_events
        where campaign_id = '$campid' AND channel ='page'  ";
$result6 = mysqli_query($conn, $sql6);
if (mysqli_num_rows($result6) > 0) {
                // output data of each row
                while($row6 = mysqli_fetch_assoc($result6)) {
                    $pageid[] = $row6['channel_id'];
                }
} else {
    echo "";
}
/*Querying Page Names based on pageid*/
$sql7= "SELECT title
        FROM mau1u_pages
        WHERE id IN('".implode("','",$pageid)."')";
$result7 = mysqli_query($conn, $sql7);
if (mysqli_num_rows($result7) > 0) {
                // output data of each row
                while($row7 = mysqli_fetch_assoc($result7)) {
                    $pagelist[] = $row7['title'];
                }
} else {
    echo "";
}

?>
<!-- Php Code for Connection and querying End -->
<!--
Add Left nav, Top nav and side Nav here
-->
<!-- start: app-content -->
<section id="app-content">
  <div class="content-body">    
     <div class="page-header">
       <h2>Campaign Insights</h2>
    </div>

    <div class="grid">
        <div class="block" id="header">
            <div class="card" id="header-itm-1">
                <div class="card-body">
                    <center>
                        <b>Campaign Name</b>
                        <br>
                        <font size="3"><?php echo $cname ?></font>
                    </center>
                </div>
            </div>
            
            <div class="card" id="header-itm-2">
                <div class="card-body">
                    <center>
                        <b>Target Segment</b>
                        <br>
                        <font size="3"><?php $string = rtrim(implode(',', $leadlistname), ',');

                                    echo $string; ?> </font>
                    </center>
                </div>
            </div>

            <div class="card" id="header-itm-3">
                <div class="card-body">
                    <center>
                        <b>Audience Size</b>
                        <br>
                        <font size="3"><?php echo $qwe;?></font>
                    </center>
                </div>
            </div>
        </div>
        <div class="block" id="channel">
            <div class="page-header" id="channel-header">
                <center><h2>Channel Performance</h2></center>
            </div>
        </div>
        
        <div class="block" id="components">
          <!-- content block -->
            <div class="component" id ="em">
                <div class="page-header">
                      <center><b>Emails</b></center>
                </div>
                <div class="content">
                    <div id="barchart_email"></div>
                </div>
            </div>
            <!-- content block -->
            <!-- content block -->
            <div class="component" id ="so" style ="display:none;">
                <div class="page-header">
                      <center><b>Social</b></center>
                </div>
                <div class="content">
                    
                </div>
            </div>
            <!-- content block -->
            <!-- content block -->
            <div class="component" id ="lp">
                <div class="page-header">
                      <center><b>Landing Page</b></center>
                </div>
                <div class="content">
                    <div id="barchart_landingpage"></div> 
                </div>
            </div>
            <!-- content block -->
            <!-- content block -->
            <div class="component" id ="wt">
                <div class="page-header">
                      <center><b>Web Tracking</b></center>
                </div>
                <div class="content">
                    
                </div>
            </div>
            <!-- content block -->
            
        </div>
       <div class="block" id="channel">
            <div class="page-header" id="channel-header">
                <center><h2>Audience Performance</h2></center>
            </div>
        </div>
        <div class="block" id="components">
          <!-- content block -->
            <div class="component">
                <div class="page-header">
                      <center><b>Top Positions by Read Count</b></center>
                </div>
                <div class="content">
                    <div id="pietop5pos"></div> 
                </div>
            </div>
            <!-- content block -->
            <!-- content block -->
            <div class="component">
                <div class="page-header">
                      <center><b>Top Companies by Read Count</b></center>
                </div>
                <div class="content">
                    <div id="pietop5com"></div>
                </div>
            </div>
        </div>
    </div>  
  </div>
</section>



<!--- Charts -->
<!-- Google Charts Javascript-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Jquery-->
<script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js”></script>   

<!--Bar chart For Emails-->
<script type="text/javascript">
     google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Email', 'Sent Count', 'Read Count'],
          <?php 
			include('conn.php');
			$query = "SELECT id,name,read_count,sent_count 
                        FROM mau1u_emails 
                        WHERE id IN('".implode("','",$channelid)."') AND is_published = 1";
            $exec = mysqli_query($conn,$query);
			while($rowx = mysqli_fetch_array($exec)){
            echo "['".$rowx['name']."',".$rowx['sent_count'].",".$rowx['read_count'].",],";
            }
            ?> 
        ]);

        var options = {
    
          chart: {
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          hAxis: {title: ''},
          colors: ['#0000FF', '#FF0000', '#1b9e77']
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
	</script>
	
<!--Bar chart For Landing page-->

<script type="text/javascript">
     google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'Hits'],
          <?php 
			include('conn.php');
			$sql8 = "SELECT DISTINCT (channel_id)
        FROM mau1u_campaign_events
        where campaign_id = '$campid' AND channel ='email'  ";
            $result8 = mysqli_query($conn, $sql8);
            $sql9 = "SELECT count(id) as count
            FROM mau1u_page_hits
            WHERE page_id IN('".implode("','",$pageid)."') ";
            $result9= mysqli_query($conn, $sql9);
			while($rowa = mysqli_fetch_array($result8)){
			    $tit[] =$rowa['title'];
                }
            while($rowb = mysqli_fetch_array($result9)){
			    $co[] =$rowb['count'];
                }
            $count = sizeof($tit);
            for($i=0;$i<$count;$i++)
            {
                echo "['".$tit[$i]."',".$co[$i].",],"; 
            }
            ?>
        ]);

        var options = {
            legend: { position: 'none' },
          chart: {
          },
          bars: 'horizontal',
          vAxis: {format: 'decimal'},
          hAxis: {title: 'hits'},
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_landingpage'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
	</script>
	
 <!--Pie chart For Top 5 Position-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Name', 'Count'],
          <?php
        include('conn.php');
            /*  Querying For Top 5 Position */
            $sql10 = "SELECT position,count(position) as count
            FROM mau1u_email_stats,mau1u_leads
            WHERE mau1u_email_stats.lead_id =  mau1u_leads.id AND email_id IN('".implode("','",$channelid)."') AND lead_id is NOT NULL AND is_read = 1
            GROUP BY position
            ORDER by count DESC
            LIMIT 5";
            $result10= mysqli_query($conn, $sql10);
            while($rowx = mysqli_fetch_array($result10)){
            echo "['".$rowx['position']."',".$rowx['count'].",],";
            }
            
          ?>
        ]);

        var options = {
            legend:'labeled',
        pieSliceText: 'none',
        is3D : 1,
        fontSize : 13,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pietop5pos'));

        chart.draw(data, options);
      }
    </script>
    
     <!--Pie chart For Top 5 Company-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Name', 'Count'],
          <?php
        include('conn.php');
            /*  Querying For Top 5 Position */
            $sql11 = "SELECT company,count(company) as count
            FROM mau1u_email_stats,mau1u_leads
            WHERE mau1u_email_stats.lead_id =  mau1u_leads.id AND email_id IN('".implode("','",$channelid)."') AND lead_id is NOT NULL AND is_read = 1
            GROUP BY company
            ORDER by count DESC
            LIMIT 5";
            $result11= mysqli_query($conn, $sql11);
            while($rowy = mysqli_fetch_array($result11)){
            echo "['".$rowy['company']."',".$rowy['count'].",],";
            }
            
          ?>
        ]);

        var options = {
            legend:'labeled',
        pieSliceText: 'none',
        is3D : 1,
        fontSize : 13,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pietop5com'));

        chart.draw(data, options);
      }
    </script>