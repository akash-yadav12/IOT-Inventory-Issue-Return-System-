<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Inventory Management System</title>
    <!-- <link rel="stylesheet" type="text/css" href="./css/Issue_Return.css"> -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
        <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" src="./js/decor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

    <style>
        button{
            padding-left:500px;
        }
        tr:nth-child(even){
            background-color:#f2f2f2;
        }
        th{
            background-color:yellow;
        }
    </style>    
</head>
<body>
    <table class = "table table bordered">
        <tr>
            <th>G_id</th>
            <th>Roll no</th>
            <th>Year</th>
            <th>Delete</th>
        </tr>
        <?php
            $con=mysqli_connect("localhost","root","akash","iot_inventory");
            if($con){
                // echo "connection success";
                $query="Select g_id ,Rollno,s_year FROM students where g_id is not null";
                $data=(mysqli_query($con,$query));
                if(mysqli_num_rows($data)>0){
                    while($row =mysqli_fetch_assoc($data)){
        ?>
                        <tr id="delete<?php echo $row['Rollno']; ?>">
                            <td> <?php echo $row['g_id']; ?> </td>
                            <td> <?php echo $row['Rollno']; ?> </td>
                            <td> <?php echo $row['s_year']; ?> </td>
                            <td> <button onclick="deleteAjax(<?php echo $row['Rollno']; ?>)" class="btn btn-danger">Delete </button></td>
                        </tr>
        <?php }
                    echo "</table>";
                }
                else{
                    echo "no groups created yet";
                }
            }
            else
            {
                echo "connection unsuccessful";
            }
        ?>



        <script>
            function deleteAjax(id){
                if(confirm('are you sure?')){
                    $.ajax({
                        type:'post',
                        url:'delete.php',
                        data:{delete_id:id},
                        success: function(data){
                            $('#delete'+id).hide();
                        }
                    })
                }
            }
        </script>
        

        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    </body>
</html>