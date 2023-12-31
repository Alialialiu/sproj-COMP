<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Complain</title>
        <!-- custom -->
    <link rel="stylesheet" href="style/usercomp.css">
    <!-- bootstrap -->
    <link href="bootstrap/animate.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/animate.css" rel="stylesheet">
    <!-- fonts -->
    <script src="bootstrap/jquery.js"></script>
    <script src="jquery/usercomp.js"></script>
   
</head>
<body> 
    
    <div class="usercompmain">
        <div class="usercompform">
            <div class="usercomptitle mt-5"><h4>What is your Complain?</h4></div>
            <form id="usercompforms">
                <div class="div1">
                    <input placeholder="Firstname" type="text" name="fname" class="input mt-2 me-1" required>
                    <input placeholder="Middlename" type="text" name="mname" class="input mt-2 me-1" required>
                    <input placeholder="Lastname" type="text" name="lname" class="input mt-2">
                </div>
                    <input placeholder="Adrress" type="text" name="addr" class="input mt-2">
                    <input placeholder="Email" type="text" name="email" class="input mt-2">
                    <input placeholder="Contact#" type="text" name="numb" class="input mt-2">
                    <textarea name="mess" placeholder="Message Complain" class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <?php
                            $conn = mysqli_connect("locaLhost","root","","complain");
                            $query = $conn->query("SELECT * FROM tb_complaintype");
                        ?>
                    <select class="form-select form-select-lg mb-3 mt-2" name="complains" aria-label=".form-select-lg example">
                        <option selected>None</option>
                            <?php
                                while ($data = mysqli_fetch_array($query)) {
                            ?>   
                              <option value="<?php echo $data['comp_id'] ?>"><?php echo $data['comp_name'] ?></option>
                            <?php } ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>