<html>
    <head>
        <title> Automator</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    <body>
        <h1 align="center"> Automator</h1>
        <hr/>
    <div class="panel panel-default" style="text-align:center;">
        <div class="panel-heading">
            <h3>Click the button to Automate</h3>
        </div>
    <br/>
        <div class="panel-body">
            <a href="automate.php" target= "_blank" >
                <button class="btn-success">Click to Automate</button>
            </a>
        </div>
    </div>
<hr/>
    <div class="panel panel-default" style="text-align:center;">
  <div class="panel-heading"><h3>Add a text to Header</h3></div>
    <br/>
        <div class="panel-body">
            <form action="writeheader.php" method="post">
                <input type="text" name="heading" required>
                <input type="submit" class="btn-success" value="submit">
            </form>
        </div>  
        </div>
 <hr/>
 <hr/>
    <div class="panel panel-default" style="text-align:center;">
  <div class="panel-heading"><h3>Add Image to Header</h3></div>
    <br/>
        <div class="panel-body">
            <form action="imageheader.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" />
                <br/>
                <input type="submit" class="btn-success" value="submit" />
            </form>
        </div>  
        </div>
 <hr/>
    <div class="panel panel-default" style="text-align:center;">
        <div class="panel-heading">
            <h3>Click the button to Fix 500 Segment Error</h3>
        </div>
    <br/>
        <div class="panel-body">
            <a href="segmentfix.php" target= "_blank" >
                <button class="btn-success">Click to Fix Segment Error</button>
            </a>
        </div>
    </div>
 <hr/>
    <div class="panel panel-default" style="text-align:center;">
        <div class="panel-heading">
            <h3>Error Page Changes</h3>
        </div>
    <br/>
        <div class="panel-body">
            <a href="errorpage.php" target= "_blank" >
                <button class="btn-success">Click to Change</button>
            </a>
        </div>
    </div>
<hr/>
<div class="panel panel-default" style="text-align:center;">
        <div class="panel-heading">
            <h3>Error Logo Change</h3>
        </div>
    <br/>
        <div class="panel-body">
             <form action="errorbotlogo.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" />
                <br/>
                <input type="submit" class="btn-success" value="submit" />
            </form>
        </div>
    </div>
<hr/>
    </body>
</html>