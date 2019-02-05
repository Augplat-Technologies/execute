<!--
Add Left nav, Top nav and side Nav,Footer Here
-->
<!-- start: app-content -->
            <section id="app-content">
                
<div class="content-body">
    
<div class="page-header">
    <div class="box-layout">
        <div class="col-xs-5 col-sm-6 col-md-5 va-m">
            <h3 class="pull-left">Insights</h3>
            <div class="col-xs-2 text-right pull-left">
                            </div>
                    </div>
            <div class="clearfix"></div>

    </div>

</div>
</div>
    <div class="panel panel-default bdr-t-wdh-0 mb-0">
                
    <div class="card-header">
            <?php
            include('conn.php');
                $offset = 0;
                $page_result =5; 
	
                if($_GET['pageno'])
                    {
                    $page_value = $_GET['pageno'];
                    if($page_value > 1)
                        {	
                    $offset = ($page_value - 1) * $page_result;
                    }
                }
            $sql = "SELECT * 
                    FROM mau1u_campaigns
                    WHERE is_published = 1 limit $offset, $page_result";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            echo "<div class='table-responsive'>
                    <table class ='table table-hover table-striped table-bordered campaign-list'>
                <tr>
                <th>Campaigns</th>
                </tr>";
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
		            echo "<tr>";
		            echo "<td>". "<a href ='camp.php?id=".$row['id']."'>".$row['name'] ."</a>". "</td>";
		            echo "</tr>";
		            echo "</div>";        
    }
echo "</table>";
} else {
    echo "0 results";
    header('Location: index.php');
}
            ?>
    </div>
    <?php
    $s="SELECT * 
        FROM mau1u_campaigns
         WHERE is_published = 1";
    $result1 = mysqli_query($conn, $s);
    $count1 = mysqli_num_rows($result1);
    $ab = $count1/5;
    $ab = ceil($ab);
    $pagecount = $ab; // Total number of rows
        $num = $pagecount;
    echo "<center><div class='panel-footer> 
        <div class='pagination-wrapper ml-md mr-md text-center'>
            <ul class='pagination np nm '>";
        if($_GET['pageno'] > 1)
        {
        echo "<li><a href = 'index.php?pageno=".($_GET['pageno'] - 1)." '> Prev </a></li>";
        }
        for($i = 1 ; $i <= $num ; $i++)
        {
        echo "<li><a href = 'index.php?pageno=".$i." '>". $i ."</a></li>";
        }
    if($num!= 1 && ($_GET["pageno"] < $num) )
    {
    echo "<li><a href = 'index.php?pageno=".($_GET['pageno'] + 1)." '> Next </a></li>";
    }
   echo "</ul>
        </div>
        </div></center>"; 
?>
</div>
</section>
<?php
mysqli_close($conn);
?>