<?php
require('connection.inc.php');
require('function.inc.php');


$name = get_safe_value($con,$_POST['name']);
$email = get_safe_value($con,$_POST['email']);
$mobile = get_safe_value($con,$_POST['mobile']);
$password = get_safe_value($con,$_POST['password']);

$check_user = mysqli_num_rows(mysqli_query($con,"select * from users where email = '$email'"));

if($check_user>0){
    echo "exists";
}else{
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into users(name,email,password,mobile,added_on) values('$name','$email','$password','$mobile','$added_on')");
    echo "registered";
    $id=mysqli_insert_id($con);
    $_SESSION['USER_LOGIN']='yes';
    $_SESSION['USER_ID']=$id;
    $_SESSION['USER_NAME']=$name;
}


?>