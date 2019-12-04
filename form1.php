<?php
session_start();
$query = $_SESSION['query'];

$_SESSION['query'] = $query;
        $email;$comment;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }
        if(isset($_POST['comment'])){
          $comment=$_POST['comment'];
        }
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<script>
          alert("Please Verify Recaptcha");
          window.location = "index2.php";
          </script>';
          exit;
        }
        $secretKey = "6Lf96MEUAAAAAHDqbIn8X3qqH8GIVWE-TWvF5KOr";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) {
                echo '<script>
                window.location = "srchtest.php";
                </script>';
        } else {
          echo '<script>
          alert("Please Verify Recaptcha");
          window.location = "index2.php";
          </script>';
  }
?>