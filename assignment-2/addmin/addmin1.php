<?php
    require('../engine.php');
    ConnectDB();
    
    $cond = '';
    if(isset($_POST['btnS'])){
        $cond = ' WHERE user_id LIKE "%'.$_POST['txtSearch'].'%" 
                    OR user_name LIKE "%'.$_POST['txtSearch'].'%"';
    }
    $sql = 'SELECT * FROM users'.$cond;
    $rs = mysqli_query($GLOBALS['conn'],$sql);

    $tsql = 'SELECT * FROM textr WHERE user_id="'.$row['text'].'"';
    $rst = mysqli_query($GLOBALS['conn'],$tsql);
    $trow = mysqli_fetch_array($rst);
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
</style>
<body>
<?php require('./nav.php')?>
<div class="row">
    <div class="col-3 text-center">
        <?php require('./menu.php') ?>
     </div>
        <div class="col">
            <h1>จัดการส่งข้อมูล</h1>
            <div class="row">
                <div class="col-8">
            <form method="post" id="form0">
               
            <input type="text" class="form-control" placeholder="ID/ชื่อ"
            name="txtSearch">
</div>
                    <div class="col-4">
                <button name="btnS" class="btn btn-outline-info" type="submit" style="margin-bottom: 0.2cm"><i class="bi bi-search"></i>ค้นหา</button>
                    </div>
                    </div>
                <table class="table w-75">
                    <?php
                        $i = 0;
                        while($data = mysqli_fetch_assoc($rs)){
                            $i++;
                            
                    ?>
                    <tr>
                        <th>ticket</th>
                        <th class="w-25">การจัดการข้อมูล</th>
                    </tr>

                    <tr>
                        <td>
                            <?php echo $i.'. '.$data['user_name']; ?>
                            <br>
                            <?php echo $trow['text']; ?>
                        </td>
                    
                        <td>
                        <button type="submit" class="btn btn-info w-50" onclick="if(confirm('ยืนยันการลบข้อมูล ??')) 
                        { window.location.href='addmin.php?del_id=<?php echo $data['user_id'] ?>'; }">ส่ง</button>
                            
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </form>
            <?php echo '<h5 class="txt-light">ข้อมูลจำนวน '.mysqli_num_rows($rs).' รายการ</h5>'; ?>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
