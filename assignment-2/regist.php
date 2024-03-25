<?php
    require('./engine.php');
    ConnectDB();
    $err = '';
    if(isset($_POST['btn1'])){
        $sql = 'SELECT * FROM users WHERE user_id="'.$_POST['user_id'].'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)!=0){$err = '<div class="alert alert-danger">ชื่อผู้ใช้นี้มีอยู่แล้ว</div>';}

        $sql = 'SELECT * FROM users WHERE user_name="'.$_POST['user_name'].'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)!=0 && $err == ''){$err = '<div class="alert alert-danger">อีเมล์นี้มีอยู่แล้ว</div>';}

        $sql = 'SELECT * FROM users WHERE user_telephone="'.$_POST['user_telephone'].'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)!=0 && $err == ''){$err = '<div class="alert alert-danger">เบอร์โทรนี้มีอยู่แล้ว</div>';}

        if($_POST['user_id']=="admin"){$err = '<div class="alert alert-danger">ไม่สามารถใช้ชื่อนี้ได้</div>';}

        if($err == ''){
            $sql = 'INSERT INTO users (user_id,user_name,user_password,user_telephone,user_address)
            VALUES ("'.$_POST['user_id'].'",
                    "'.$_POST['user_name'].'",
                    "'.md5($_POST['user_password']).'",
                    "'.$_POST['user_telephone'].'",
                    "'.$_POST['user_address'].'")';
            mysqli_query($GLOBALS['conn'],$sql);
            header("Location:./index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPTG Stadium</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<style>
    
.container {
    width: 800px;
    background: transparent;
    border: 2px solid rgba(28, 25, 25, 0.2);
    backdrop-filter: blur(30px);
    
    color:#fff;
    border-radius: 10px;
    padding: 20px 30px;
}


</style>
<body>

        
        <div class="container mt-4">
            <div class="row">
               
                <div class="col-12 ">
                    <center><h1>ป้อนข้อมูลเพื่อสมัครสมาชิก</h1></center>
                    <form method="post">
                    <table width="100%">
                        <tr>
                            <th><input type="text" name="user_id" placeholder="ไอดีผู้ใช้" class="form-control w-100 my-2" maxlength="10" required></th>
                            <th><input type="text" name="user_name" placeholder="ชื่อ-นามสกุล" class="form-control w-100 my-2" maxlength="50" required></th>
                        </tr>
                    </table>
                    <input type="password" name = "user_password" placeholder="รหัสผ่าน" class="form-control w-100 my-2" maxlength="100" required>
                    <input type="tel" name="user_telephone" placeholder="เบอร์โทรศัพท์" class="form-control w-100 my-2" maxlength="10" required>
                    <textarea class="form-control" placeholder="ที่อยู่" name="user_address" required></textarea>
                    <div class="col-12 text-center">
                        <button name="btn1" class="btn btn-info p-3 w-50 mt-3 my-3" type="submit">ลงทะเบียน</button>
                    </div>
                    </form>
                    <div>คุณมีบัญชีผู้ใช้งานอยู่แล้ว? <a class="text-success " href="index.php">เข้าสู่ระบบ</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คุณไม่ต้องการสมัครแล้ว?  <a class="text-danger " href="index.php">ยกเลิก</a>
                    </div>

                    <?php echo $err; ?>
                </div>
                
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
