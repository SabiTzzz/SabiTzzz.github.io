<!-- link ke nav.php -->
<?php include 'expand/nav.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-11`8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borneo FC | Login Page</title>
    <link rel="stylesheet" href="styles/daftar.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
   <div class="container">
      <div class="box">
         <div class="box-register" id="register">
            <div class="top-header">
                <h3>Sign Up, Now!</h3>
                <small>We are happy to have you with us.</small>
            </div>
         <div class="input-group">
            <form action="print.php" method="post">
               <div class="input-field">
                  <input type="text" class="input-box" id="regNama" name="regNama" required>
                  <label for="regNama">Username</label>
               </div>
               <div class="input-field">
                  <input type="text" class="input-box" id="regEmail" name="regEmail" required>
                  <label for="regEmail">Email address</label>
               </div>
               <div class="input-field">
                  <input type="password" class="input-box" id="regPassword" name="regPassword" required>
                  <label for="regPassword">Password</label>
                  <div class="eye-area">
                     <div  class="eye-box" onclick="myRegPassword()">
                        <i class="fa-regular fa-eye" id="eye-2"></i>
                        <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                     </div>
                  </div>
               </div>
               <div class="remember">
                  <input type="checkbox" id="formCheck2" class="check">
                  <label for="formCheck2">Remember Me</label>
               </div>
                  <div class="input-field">
                     <input type="submit" class="input-submit" value="Sign Up" required>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
     <script>
        function myRegPassword(){
    
         var d = document.getElementById("regPassword");
         var b = document.getElementById("eye-2");
         var c = document.getElementById("eye-slash-2");
 
         if(d.type === "password"){
            d.type = "text";
            b.style.opacity = "0";
            c.style.opacity = "1";
         }else{
            d.type = "password";
            b.style.opacity = "1";
            c.style.opacity = "0";
         }
        }
     </script>
</body>
</html>

<!-- link ke footer.php -->
<?php require 'expand/footer.php' ?>