<?php
    require('./engine.php');
    ConnectDB();
    $err = '';
    if(isset($_POST['btn1'])){
        $day = date('Y-m-d H:i:s');
        if($err == ''){
            $sql = 'INSERT INTO textr (user_id,text,day)
            VALUES ("'.$_SESSION['user']['user_id'].'",
                    "'.$_POST['text'].'",
                    "'.$day.'")';
            mysqli_query($GLOBALS['conn'],$sql);
            header('Location:ticket1.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ticket</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<style>

.container {
    
    width: 600px;
    background: transparent;
    border: 2px solid rgba(28, 25, 25, 0.2);
    backdrop-filter: blur(30px);
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    color:#fff;
    border-radius: 10px;
    padding: 30px 40px;
}


.container .btn{
    width: 300px;
    height: 50px;
    background-color: #fff;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 18px;
    color: #333;
    font-weight: 600;
    text-align: center;
}

.container h1 {
    text-align: center;
}

.container form {
    text-align: center;
    
}

.container input {
    margin-bottom: 20px;
    
}

.container a {
    display: block;
    text-align: center;
    margin-top: 10px;
}
.input-box input {
    width: 460px;
    height: 60px;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 40px;
    font-size: 18px;
    color: #fff;
    padding: 20px 45px 20px 20px;

}

.input-box input::placeholder {
    color: #fff;
}

</style>

<body>
<?php require('./nav.php')?>
<div class="container mt-5">
    <div class="row">
        <div class="col"></div>
        <div class="col-12">
            <form method="post">
                <h1>กรออกรายละเอียด</h1>              
                <textarea class="form-control" placeholder="ข้อมูล" name="text" required></textarea>
                <p><button name="btn1" class="btn mt-3" valign="middle" type="submit">ส่ง</button></p>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
