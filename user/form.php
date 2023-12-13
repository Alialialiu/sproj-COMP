<?php 
$conn = mysqli_connect('localhost', 'root', '', 'complain');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom -->
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/forms.css">
    <!-- bootstrap -->
    <link href="../bootstrap/animate.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/animate.css" rel="stylesheet">
    <!-- fonts -->
    <script src="../bootstrap/jquery.js"></script>
    <title>index</title>
</head>
<script src="jquery/registration.js"></script>
<script src="jquery/validate.js"></script>
<body>
   <div class="main-form">
        <div class="form-head-title">
            <h1>Welcome to Complaint Management System!</h1>
            <p>"Your feedback shapes our improvement. Speak up, and together we create positive change."</p>
        </div>
        <div class="form-cont">
            <div class="form-cont1" id="form-cont1">
                <div class="form-grp-btn">
                    <button class="act2">Sign Up /</button>
                    <button id="lgn-btn">Log In</button>
                </div>
                    <div id="error-message"></div>
                    <!-- Register Form -->
                    <form  class="form-cust" id="form-reg">
                        <div id="card1">
                        <label  class="form-label">First name</label>
                            <input type="text" class="form-control"  name="firstname"  required>
                                
                        <label  class="form-label">Last name</label>
                            <input type="text" class="form-control" name="lastname"  required>
                                
                        <label class="form-label">Gender</label>
                            <select class="form-select" name="gender" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                                
                        <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" required>
                            <button class="btn btn-secondary btn-sm mt-5 float-end" id="form-btn-nxt" type="button">Next</button>
                        </div>

                        <div id="card2">
                            
                        <label class="form-label">Gmail</label>
                            <input type="text" class="form-control" name="gmail" required>
                                
                        <label  class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                               
                        <labelb class="form-label">Password</label>
                            <input type="password" class="form-control" name="password"id="passwordinp" required>
                                <div class="form-feedbackpass text-muted">
                                   
                                </div>
                        <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name=""id="confirmPassword" required>
                                <div class="form-feedback">
                                    <small class="text-muted" id="form-feedbackconf"></small>
                                </div>
                                <button class="btn btn-secondary btn-sm mt-5 float-start" id="hide-nxt" type="button">Next</button>
                                <button class="btn btn-secondary btn-sm mt-5 float-start" id="form-btn-prv" type="button">Prev</button>
                        </div>
                    <button class="btn btn-primary mt-5 float-end" id="form-btn-submit">Submit</button>
                    </form>               
            </div>
            <div class="form-cont1" id="form-cont2">
                <div class="form-grp-btn">
                    <button id="reg-btn" class="act2">Sign Up /</button>
                    <button id="lgn-btn " class="act1">Log In</button>
                </div>
                    <div id="error-message"></div>
                    <!-- Register Form -->
                    <form  class="form-cust" id="form-logn">     
                        <label  class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                               
                        <labelb class="form-label">Password</label>
                            <input type="password" class="form-control" name="password"id="passwordinp" required>
                                <div class="form-feedbackpass text-muted">  
                                </div>
                        <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name=""id="confirmPassword" required>
                                <div class="form-feedback">
                                    <small class="text-muted" id="form-feedbackconf"></small>
                                </div>
                    <button class="btn btn-primary mt-5 float-end" id="form-btn-submit">Submit</button>
                    </form>               
            </div>
            <!-- form Log-in  -->
        </div>
   </div>
<!-- bootsrap -->
<script src="jquery/index.js"></script>

<script src="../bootstrap/js/popper.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>