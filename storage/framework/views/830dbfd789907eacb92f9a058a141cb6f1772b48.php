<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Registration Page</title>
    <style>
        /* The message box is shown when the user clicks on the password field */
        #message {
        display:none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 20px;
        margin-top: 10px;
        }

        #message p {
        padding: 10px 35px;
        font-size: 15px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
        color: green;
        }

        .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
        color: red;
        }

        .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
        }
    </style>
</head>
<body>
    <?php if(session('save')): ?>
    <script> 
        alert("Success"); 
    </script> 
    <?php endif; ?> 
    <?php if(session('error')): ?> 
    <script> 
        alert("Failed"); 
    </script> 
    <?php endif; ?> 
    <a class="w3-button w3-blue w3-round w3-right" href="<?php echo e(url('/')); ?>">Landing Page</a>    
    <header class="w3-header w3-blue w3-center w3-padding-32">
        <h3>MyTutor Tutor Registration Page</h3>
    </header>

    <div>
        <p class="w3-container w3-padding w3-blue w3-center w3-margin">Registration Form</p>
    </div>

    <div style="display: flex;justify-content: center">
        <div class="w3-padding-32 w3-margin" style="width:600px;margin:auto;text-allign:center;">
            <form action="<?php echo e(route('register.post')); ?>"  method="post"> 
                <?php echo e(csrf_field()); ?> 
                <p>
                    <label class="w3-text-blue"><b>Email</b></label>
                    <input class="w3-input w3-round w3-border" type="email" name="email" id="email" placeholder="Input your Email" required>
                </p>
                <?php if($errors->has('email')): ?> 
                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>            
                <?php endif; ?> 
                <p>
                    <label class="w3-text-blue"><b>Password</b></label>
                    <input class="w3-input w3-round w3-border" type="password" name="password" id="password" placeholder="Input your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                </p>
                <?php if($errors->has('password')): ?> 
                <span class="text-danger"><?php echo e($errors->first('password')); ?></span>            
                <?php endif; ?> 
                <div class="w3-round" id="message">
                    <h5>Password must contain the following:</h5>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
                <p>
                    <label class="w3-text-blue"><b>Name</b></label>
                    <input class="w3-input w3-round w3-border" type="text" name="name" id="name" placeholder="Input your Name" required>
                </p> 
                <?php if($errors->has('name')): ?> 
                <span class="text-danger"><?php echo e($errors->first('name')); ?></span> 
                <?php endif; ?> 
                <p>
                    <label class="w3-text-blue"><b>Phone Number</b></label>
                    <input class="w3-input w3-round w3-border" type="tel" name="phoneNo" id="phoneNo" maxlength="11" placeholder="Input your Phone Number" required>
                </p>
                <?php if($errors->has('phoneNo')): ?> 
                <span class="text-danger"><?php echo e($errors->first('phoneNo')); ?></span>            
                <?php endif; ?> 
                <p>
                    <label class="w3-text-blue"><b>Mailing Address</b></label>
                    <textarea class="w3-input w3-round w3-border" type="text" name="address" id="address" rows="4" width="100%" placeholder="Input your Address" required></textarea>
                </p>
                <?php if($errors->has('address')): ?> 
                <span class="text-danger"><?php echo e($errors->first('address')); ?></span>            
                <?php endif; ?> 
                <p>
                    <label class="w3-text-blue"><b>State</b></label>
                    <select class="w3-input w3-block w3-round w3-border" name="state" id="state" required>
                        <option>Johor</option>
                        <option>Kedah</option>
                        <option>Kelantan</option>
                        <option>Melaka</option>
                        <option>Negeri Sembilan</option>
                        <option>Pahang</option>
                        <option>Penang</option>
                        <option>Perak</option>
                        <option>Perlis</option>
                        <option>Sabah</option>
                        <option>Sarawak</option>
                        <option>Selangor</option>
                        <option>Terengganu</option>
                    </select>
                </p>
                <?php if($errors->has('state')): ?> 
                <span class="text-danger"><?php echo e($errors->first('state')); ?></span>            
                <?php endif; ?> 
                <div class="w3-center">
                    <button class="w3-button w3-blue w3-round w3-center">Register</button> 
                </div>
            </form>
            
            <div style="text-align:center">
                <a class="w3-text-blue" href="<?php echo e(url('login')); ?>">Already have an account? Please Login</a>
            </div>
        </div>
    </div>

    <footer class="w3-footer w3-center w3-blue"><p>MyTutor</p></footer>

    <script>
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
    }
    </script>
</body>
</html><?php /**PATH C:\Users\HP\MyTutor\resources\views/register.blade.php ENDPATH**/ ?>