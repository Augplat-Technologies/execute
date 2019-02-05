Navigate to /app/bundles/PageBundle/Views/Page/details.html.php

<div class="panel bg-transparent shd-none bdr-rds-0 bdr-w-0 mt-sm mb-0">
            <div class="panel-heading">
                <div class="panel-title">Share</div>
            </div>
            <div class="panel-body pt-xs">
                <div class="btn btn-primary " id="fb" onclick="share()"><i class="fa fa-facebook"></i></div>
                <div class="btn btn-primary " id="li" onclick="return lshare('https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $pageUrl; ?>')"><i class="fa fa-linkedin"></i></div>
                <div class="btn btn-primary " id="tw" onclick="return tshare('https://twitter.com/share?url=<?php echo $pageUrl; ?>')"><i class="fa fa-twitter"></i></div>
            </div>
            <script>
            function load(){
            window.fbAsyncInit = function() {
            FB.init({
            appId            : '829778654080927',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v3.2'
            });
        };

        (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
            }
        window.onload = load;
    </script>
    <script>
        function share() {
            document.getElementById("fb").innerHTML = document.getElementById("fb").innerHTML ;
    FB.ui({
    method: 'share',
    display: 'popup',
    href: '<?php echo $pageUrl; ?>',
  }, function(response){});
}
    </script>
    <script>
        function lshare(url) {
        document.getElementById("li").innerHTML = document.getElementById("li").innerHTML ;
        newwindow=window.open(url,'name','height=500,width=600');
        if (window.focus) {newwindow.focus()}
    return false;
    }
    </script>
    <script>
        function tshare(url) {
        document.getElementById("tw").innerHTML = document.getElementById("tw").innerHTML ;
        newwindow=window.open(url,'name','height=500,width=600');
        if (window.focus) {newwindow.focus()}
    return false;
    }
    </script>
