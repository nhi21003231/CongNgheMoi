<?php
    $act='';
    $search='';
    $id=0;
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        if($act=='category'){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            include('frontend/category.php');
        }
        if($act=='product'){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            include('frontend/product_detail.php');
        }
        if($act=='cart'){
            include('frontend/cart.php');
        }
        if($act=='my_bill'){
            include('frontend/my_bill.php');
        }
        if($act=='my_account'){
            include('frontend/my_account.php');
        }
        if($act=='vechungtoi'){
            include('frontend/vechungtoi.php');
        }
        if($act=='tintuc'){
            include('frontend/tintuc.php');
        }
        if($act=='tintuc1'){
            include('frontend/tintuc1.php');
        }
        if($act=='tintuc2'){
            include('frontend/tintuc2.php');
        }
        if($act=='tintuc3'){
            include('frontend/tintuc3.php');
        }
        if($act=='tintuc4'){
            include('frontend/tintuc4.php');
        }
        if($act=='lienhe'){
            include('frontend/lienhe.php');
        }
        if($act=='bill_detail'){
            include('frontend/bill_detail.php');
        }
        if($act=='login'){
            if(isset($_SESSION['ten_dangnhap']))
                unset($_SESSION['ten_dangnhap']);
            include('frontend/login.php');
        }
        if($act=='register'){
            include('frontend/register.php');
        }
    }else
        if(isset($_GET['search'])){
            $search=$_GET['search'];
            if($search!='') include('frontend/category.php');
            
            
        }else if(isset($_GET['page']) && isset($_GET['id'])){ 
            $id=$_GET['id'];
            include('frontend/category.php');
        }
        else include('frontend/home_content.php');
        
    



?>