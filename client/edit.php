<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit</title>
  </head>
  <body>
		<?php 
				require('../server/db.php');

				$id = $_GET['id'];
				$query    = "SELECT * FROM favorites WHERE id='$id'";
				$result = mysqli_query($con, $query) or die(mysql_error());
				$rows = mysqli_num_rows($result);
				if ($rows == 1) {
					  while($rows = $result->fetch_assoc()) {
						$created_at = $rows['created_at'];
						$description = $rows['description'];
				  }
				}
		?>

    <form class="form" method="post" action="../server/edit-item.php" name="login">
        <h1 class="login-title">Edit form</h1>
      <div class="mb-3">
        <label for="createdAd" class="form-label">Created at</label> 
        <input type="date" class="form-control" id="createdAd" name="created_at" value="<?php echo $created_at; ?>" placeholder="Created at" autofocus="true">
      </div>
	  <div class="form-group">
		<label for="commentFormControlTextarea1">Comment</label>
		<textarea class="form-control" name='comment' id="commentFormControlTextarea1" rows="3"><?php echo $description; ?></textarea>
	  </div>
	 <input type="hidden" id="post_id" name="post_id" value="<?php echo $_GET['id']; ?>"> 
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>