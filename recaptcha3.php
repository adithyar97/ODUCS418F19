<html>
  <head>
    <title>Google recapcha demo - Codeforgeek</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
  </head>
  <body>
    <h1>Verify User</h1>
    <form id="comment_form" action="form.php" method="post">
      <!-- <input type="email" placeholder="Type your email" size="40"><br><br>
      <textarea name="comment" rows="8" cols="39"></textarea><br><br> -->
      
      <div class="g-recaptcha" data-sitekey="6Lf96MEUAAAAAAwJxM0WNYdQmJEffC4S4blU0pjP"></div>
      <input type="submit" name="submit" value="Submit"><br><br>
    </form>
  </body>
</html>