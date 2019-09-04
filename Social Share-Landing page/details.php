Navigate to /app/bundles/PageBundle/Views/Page/details.html.php
<!-- Social Share Buttons  Start-->
           <div class="panel bg-transparent shd-none bdr-rds-0 bdr-w-0 mt-sm mb-0">
                <div class="panel-heading">
                    <div class="panel-title">Share</div>
                </div>
                <div class="panel-body pt-xs">
                    <div class="btn btn-primary" id="fb" onclick="return fshare('https://www.facebook.com/sharer/sharer.php?u=<?php echo $pageUrl; ?>')"><i class="fa fa-facebook"></i></div>
                    <div class="btn btn-primary" id="li" onclick="return lshare('https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $pageUrl; ?>')"><i class="fa fa-linkedin"></i></div>
                    <div class="btn btn-primary" id="tw" onclick="return tshare('https://twitter.com/share?url=<?php echo $pageUrl; ?>')"><i class="fa fa-twitter"></i></div>
                </div>
            </div>
<!-- Social Share Buttons  End-->
<script>
    function fshare(url) {
        document.getElementById("fb").innerHTML = document.getElementById("fb").innerHTML ;
        location.reload();
        newwindow=window.open(url,'name','height=500,width=600');
        if (window.focus) {newwindow.focus()}
        return false;
        }
</script>        
<script>
        function lshare(url) {
        document.getElementById("li").innerHTML = document.getElementById("li").innerHTML ;
        location.reload();
        newwindow=window.open(url,'name','height=500,width=600');
        if (window.focus) {newwindow.focus()}
    return false;
    }
</script>
<script>
        function tshare(url) {
        document.getElementById("tw").innerHTML = document.getElementById("tw").innerHTML ;
        location.reload();
        newwindow=window.open(url,'name','height=500,width=600');
        if (window.focus) {newwindow.focus()}
    return false;
    }
</script>
