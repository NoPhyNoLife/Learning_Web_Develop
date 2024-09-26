<?php
// 连接数据库
$servername = "1.94.147.134:3306";  // 数据库服务器地址
$username = "FJiuY";     // 数据库用户名
$password = "12345678";     // 数据库密码
$dbname = "message";  // 数据库名

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 处理表单提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // 准备 SQL 语句，插入数据
    $sql = "INSERT INTO comments (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "你成功留言了！";
    } else {
        echo "发生了一点问题: " . $sql . "<br>" . $conn->error;
    }
}

// 关闭数据库连接
$conn->close();
?>
