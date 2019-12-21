<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<style>
body{
    margin:0;
    padding:0;
    background:#34495e;
}
.card{
    position: absolute;
    font-family:'Times New Roman', Times, serif;
    font-weight: bold;
    width:350px;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    background:#191919;
}
.card input[type="password"],.card input[type="email"]{
    border:0;
    background:none;
    display:block;
    margin:10px auto;
    text-align:center;
    border:2px solid #3498db;
    padding:10px 10px;
    width:200px;
    outline:none;
    color:white;
    border-radius:24px;
    transition: 0.25s;
}
.card input[type="email"]:focus,.card input[type="password"]:focus{
width:280px;
border-color:#2ecc71;
}
.btn {
    border:0;
    background:none;
    display:block;
    margin:20px auto;
    text-align:center;
    border:2px solid #2ecc71;
    padding:10px 35px;
    outline:none;
    color:white;
    border-radius:24px;
    transition: 0.25s;
    cursor:pointer;
}
.btn:hover{
background:#2ecc71;
}
</style>
<body>
    <div class="row">
       <div class="container">
            <form action="setpassword.php" method="post">
            <div class="card" >
                <div><p id="message"style="color:white;text-align:center;margin-top:10px;"></p></div>
                <div class="card-title" style="color:white;text-align:center;margin-top:40px;"><h2>RESET PASSWORD</h2></div>
                <div class="card-body">
                    <div>
                    <input type="password" class="form-control"  name="newpassword" placeholder="New password">
                    <div style="color:red;text-align:center"><p id='password'></p></div>
                    <input type="password" class="form-control" name="confirmpassword" placeholder=" confirm password">
                    <div style="color:red;text-align:center"><p id='confirmpassword'></p></div>
                    <Button class="btn" type="submit" name="reset">
                        Reset
                    </Button>
                </div>

            </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
session_start();
$error =array();
$paramiter=array('newpassword','confirmpassword');
if(isset($_POST['reset'])){
    foreach($paramiter as $value){
        if(($_POST[$value])==NULL||(!isset($_POST[$value]))){
          $error[]=$value;
        }
      } 
if(empty($error)){
    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
        $newpassword=$_POST['newpassword'];
        $con=mysqli_connect('localhost','root','pwd','iot_inventory');
        if($_POST['confirmpassword']==$newpassword){
            if($con){
                $sql="UPDATE login_details SET password='$newpassword' WHERE username ='$username'";
                $result=mysqli_query($con,$sql);
                if($result){
                    if(($result)>0){
                        echo "<script>swal({
                            title: 'success!',
                            text: 'Password change successfully!',
                            type: 'success'
                          });</script>"; 
                        if(session_destroy()){
                            echo "<script>loaction.href='#'</script>";
                        }
                    }else{
                        echo "<script>swal({
                            title: 'OOPS',
                            text: 'fail to Update password',
                            type: 'error'
                          });</script>"; 
                    }
                }
            }

        }else{
            echo "<script>swal({
                title: 'OOPS',
                text: 'Password Does not match',
                type: 'error'
              });</script>"; 
        }
}else{
    echo "<script>swal({
        title: 'OOPS',
        text: 'session Time out',
        type: 'error'
      });</script>"; 
}
}else{
    foreach($error as $value){
        echo "<script>
        document.getElementById('$value').innerHTML = '$value is missing';
        
        </script>";  
}
}
}
?>



