<?php 
    $menu = "
        <div class='container mt-3 text-center'>
<div class='d-grid gap-3'>
<table class='table'>
    <thead class='table-dark'>
      <tr><th><center><h2><font color='white'>ยินต้อนรับ</font></h2></th>
    </tr>
    <tr><center>
        <td><center><h2>ผู้ใช้ : ". $_SESSION['addmin']['addmin_name']." </h2></td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><a class='nav-link' href='addmin1.php'>หน้าหลัก</a></td>
    </tr>
    <tr>
        <td><a class='nav-link' href='addmin2.php'>สมาชิก</a></td>
    </tr>
    <tr>
        <td><a class='nav-link' href='addmin3.php'>ร้านรับขยะ</a></td>
    </tr>
</table>
<table class='table'>
    <thead class='table-success'>
        <tr>
        <th><a class='nav-link' href='../logout.php'>ออกจากระบบ</a></td>
    </tr>
</table>
</div>
</div>
        ";
        echo $menu ;
?>