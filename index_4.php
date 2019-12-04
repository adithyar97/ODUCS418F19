<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <title>Speech to text conversion using JavaScript</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
 
    </head>
 
    <body>
        <div class="mycontainer">
       
            <h1>Speech to text conversion using JavaScript</h1>
 
            <div class="mywebapp"> 
            <button id="start-btn" name="button1" title="Start">Start</button>
            <form class="example"style="margin:auto;max-width:300px" method="post" action ="srchtest.php">
                <div class="input">
                    <input type="text" placeholder="Search by Location.." name="search2" id="textbox" rows="2"></textarea>
                </div>  
                <button type="submit" >Start</button>       
            </form>   
                
                <p id="instructions">Press the Start button</p>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="script.js"></script>
    </body>
</html>