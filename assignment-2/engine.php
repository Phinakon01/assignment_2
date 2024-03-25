<?php
    date_default_timezone_set("Asia/Bangkok");
    $GLOBALS['conn']=null;
    session_start();


    function ConnectDB(){
        $GLOBALS['conn'] = mysqli_connect('localhost','root','66309010027','assignment-2');
        if(mysqli_errno($GLOBALS['conn'])){
            exit();
        }
    }

    function checkLogin(){
        if(!isset($_SESSION['user'])){
            echo "<script>
            alert('ล็อกอินก่อน!');
            window.location.href = 'index.php';
            </script>";
        }
    }
