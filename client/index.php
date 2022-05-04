<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <form class="form" method="post" action="../server/login.php" name="login">
	<p><b>Username:</b> testuser</p>
	<p><b>Password:</b> 123qwe!@#</p>
        <h1 class="login-title">Login</h1>
      <div class="mb-3">
        <label for="usernameInput" class="form-label">Username</label> 
        <input type="text" class="form-control" id="usernameInput" name="username" placeholder="Username" autofocus="true">
      </div>
      <div class="mb-3">
        <label for="passwordInput" class="form-label">Password</label>
        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password"/>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>
