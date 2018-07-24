<!-- name : Sarasa Gunawardhana # IT No : IT14078842 -->
<?php include("../classes/sessionClass.php"); ?>
<!DOCTYPE html>
<html>
	<head>
        <title>SSD</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
        <script>
            $(document).ready(function(){

                var decodedCookie = decodeURIComponent(document.cookie);
                var values = decodedCookie.split(';');
                
                var cookie_CSRF = "ssd_csrf" + "=";
                var CSRF = "";

                for(var i = 0; i <values.length; i++) {
                    var d = values[i];
                    while (d.charAt(0) == ' ') {
                        d = d.substring(1);
                    }
                    if (d.indexOf(cookie_CSRF) == 0) {
                        CSRF = d.substring(cookie_CSRF.length, d.length);
                        document.getElementById("token").setAttribute('value', CSRF);
                    }
                }
            });
        </script>
	</head>
	<body>
        <!-- Logout - seesion will destroy and redirected into index page -->
        <a href="../classes/logoutClass.php">
            <button class="btn btn-danger">Logout</button>
        </a> <br><hr>
        <strong>Hello <?php echo $_SESSION['USERNAME'] ?></strong>
        <hr>
        <?php
            if(isset($_GET['er'])){
                echo '<hr><h3 style="text-align:center;color:green;">'.$_GET['er'].'</h3><hr><br />';
            }
        ?>
        <form class="form-inline" action="../classes/tokenValidatorClass.php" method="post">
            <div class="form-group">
                <label for="email">Post Request:</label>
                <input type="text" name="request" class="form-control" id="request">
            </div>
            <!-- Auto generated token added each time -->
            <input type="hidden" name="token" value="" id="token"/>
            <button type="submit" class="btn btn-success">Send</button>
        </form> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
	</body>
</html>