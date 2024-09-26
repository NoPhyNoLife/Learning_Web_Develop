<?php
// 序列密码
$admin_password = "avfW9lW1ihEfe3P";

// 检查是否提交了登录表单
if (isset($_POST['password'])) {
    $password = $_POST['password'];

    // 验证密码
    if ($password === $admin_password) {
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

        // 查询所有评论
        $sql = "SELECT * FROM comments";
        $result = $conn->query($sql);

        // 输出评论列表
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"]. " - 昵称: " . $row["name"]. " - 联系方式: " . $row["email"]. " - 留言: " . $row["comment"]. "<br>";
            }
        } else {
            echo "No comments yet.";
        }

        // 关闭数据库连接
        $conn->close();
    } else {
        echo "无效输入!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error 404</title>
</head>
<body>
    <h2>你似乎来到了没有知识的荒原······</h2>
    <form action="admin.php" method="post">
        <label for="password">神秘代码:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">键入</button>
    </form>
</body>
</html>
