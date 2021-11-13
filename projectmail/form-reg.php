<?php
include('send.php');
if(isset($_POST['regbtn'])) {
    $user = $_POST['txtUser'];
    $email = $_POST['txtEmail'];
    $pass1 = $_POST['txtPass1'];
    $pass2 = $_POST['txtPass2'];
}

// kết nối tới server sql

$conn = mysqli_connect('localhost','root','','test');
if(!$conn) {
    die("Không thể kết nối");
}

//2. truy vấn dữ liệu
$sql = "SELECT * FROM db_user WHERE user_email='$email' OR user_name='$user'";
$result = mysqli_query($conn,$sql);

//3. xu ly ket qua
if(mysqli_num_rows($result) > 0) {
    echo 'Email hoặc Username đã tồn tại';

} else {
    //mã hóa mk
    $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
    $code = md5(uniqid(rand(), true));
    // neu chua ton tai thi luu vao csdl
    $sql2 = "INSERT INTO db_user (user_name, user_email, user_pass1) VALUES ('$user', '$email', '$pass_hash')";
    $result2 = mysqli_query($conn,$sql2);

    if($result2 >= 1) {
        sendEmail($email, $code);
    }
}
?>