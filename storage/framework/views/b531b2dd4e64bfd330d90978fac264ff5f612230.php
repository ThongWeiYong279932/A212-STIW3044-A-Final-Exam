<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Page</title>
</head>
<body class="antialiased">
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
        <h3>MyTutor Tutor Login Page</h3>
    </header>

    <div>
        <p class="w3-container w3-padding w3-blue w3-center">Login Page</p>
    </div>

    <div style="display: flex;justify-content: center">
        <div class="w3-card w3-padding w3-margin" style="width:600px;margin:auto;">
            <form action="<?php echo e(route('login.post')); ?>"  method="post" accept-charset="UTF-8">
                <?php echo e(csrf_field()); ?> 
                <p>
                    <label class="w3-text-blue"><b>Email</b></label>
                    <input class="w3-input w3-round w3-border" type="email" name="email" id="email" placeholder="Input your Email" required>
                </p>
                <?php if($errors->has('email')): ?> 
                <span class="w3-red"><?php echo e($errors->first('email')); ?></span> 
                <?php endif; ?> 
                <p>
                    <label class="w3-text-blue"><b>Password</b></label>
                    <input class="w3-input w3-round w3-border" type="password" name="password" id="password" placeholder="Input your Password" required>
                </p>
                <?php if($errors->has('password')): ?> 
                <span class="w3-red"><?php echo e($errors->first('password')); ?></span>        
                <?php endif; ?> 
                <p>
                    <input class="w3-check" name="rememberMe" type="checkbox" id="remember">
                    <label>Remember me</label>
                </p>
                <div class="w3-center">
                    <button class="w3-button w3-blue w3-round w3-center">Login</button> 
                </div>
            </form>

            <div style="text-align:center">
                <a class="w3-text-blue" href="<?php echo e(url('register')); ?>">Don't have an account? Register first</a>
            </div>
        </div>
    </div>

    <footer class="w3-footer w3-center w3-blue w3-bottom"><p>MyTutor</p></footer>

</body>
</html><?php /**PATH C:\Users\HP\MyTutor\resources\views/login.blade.php ENDPATH**/ ?>