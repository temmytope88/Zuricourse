<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>
 
    <div class="container" >
        <h2>REGISTER</h2>
        <?php error();?>
        <form action="regprocess.php" method="post" >
                <p class="form-group">
                <label for="firstname">FIRST NAME:</label><br>
                    <input type="text" name="firstname" id="" class ="form-control">
                    <?php firstname();?>
                </p>

                <p class="form-group">
                    <label for="surname">SURNAME:</label><br>
                    <input type="text" name="surname" id="" class ="form-control">
                    <?php lastname();?>
                </p>

                <p class="form-group">
                    <label for="email">EMAIL:</label><br>
                    <input type="email" name="email" id="" class ="form-control">
                    <?php email();?>
                </p>

                <p class="form-group">
                    <label for="password">PASSWORD:</label><br>
                    <input type="password" name="password" id="" class ="form-control">
                    <?php password();?>
                </p>

                <p class="form-group">
                    <label for="gender">GENDER:</label><br>
                    <input type="radio" name="gender" value="male" id="">Male<br>
                    <input type="radio" name="gender" value="female" id="">Female<br>
                    <?php gender();?>
                </p>

                <p>
                    <button type="submit" class ="btn btn-primary">SUBMIT</button>
                </p>
        </form>
    </div>
</body>
</html>