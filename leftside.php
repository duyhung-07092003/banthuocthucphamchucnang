<?php
@ob_start();
session_start();
$session_id = session_id();

?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Session::init();
$index = new index;
?>
<?php

if (isset($_GET['loaisanpham_id'])|| $_GET['loaisanpham_id']!=NULL){
    $loaisanpham_id = $_GET['loaisanpham_id'];
    }
  
?>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.scss">
    <link rel="icon" href="assets/img/2023-05-17 (2).png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/b94913fe08.js" crossorigin="anonymous"></script>
    <title>Cửa hàng bán quần áo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
 <div class="app_container">
        <div class="cartegory-top row">
                <?php  
                   $get_loaisanphamA = $index -> get_loaisanphamA($loaisanpham_id);
                   if($get_loaisanphamA){$result = $get_loaisanphamA ->fetch_assoc();} 
                ?>
            <p><a href="index.php">Trang chủ</a></p> <span>&#8594;</span>
            <p><?php if(isset($result['danhmuc_ten'])){echo $result['danhmuc_ten'];} else {echo "Vui lòng thêm danh mục";}?></p> <span>&#10230;</span>
            <p><?php if(isset($result['loaisanpham_ten'])){echo $result['loaisanpham_ten'];}else {echo "Vui lòng thêm loại sản phẩm";}?></p>
        </div>
        <div class="row">
            <div class="grid__row app_content">
                <div class="menu">
                <?php
                        $show_danhmuc = $index ->show_danhmuc();
                        if($show_danhmuc){while($result = $show_danhmuc ->fetch_assoc()) {
                            ?>
                     <li><a href="#"><?php echo $result['danhmuc_ten'] ?></a>
                         <ul class="sub-menu">
                                   <?php
                                      $danhmuc_id = $result['danhmuc_id'];
                                      $show_loaisanpham = $index ->show_loaisanpham($danhmuc_id);
                                      if($show_loaisanpham){while($result = $show_loaisanpham ->fetch_assoc()) {
                                    ?>
                             <li><a href="Subpage.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>" class="menu_li-a"><?php echo $result['loaisanpham_ten'] ?></a></li>
                    
                                    <?php
                                      } }
                                    ?>
                         </ul>
                     </li>
                <?php
                     } }
                ?>
                </div>
                </div>
                
                