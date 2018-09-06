<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 class="page-header">Thông tin chi tiết</h2>
        <!--Đặt mã PHP lấy 1 bản ghi theo ID-->
        <?php
        $id = isset($_GET['id'])? $_GET['id'] : die("ID không tồn tại");
        if($id != ""){
            require "product.php";
            $objPro = new Product();
            //Gán giá trị $id cho thuộc tính $id của đối tượng Product
            $objPro->product_id = $id;
            $row = $objPro->fetchOne();
            if($row != null){
        ?>


        <!--Sử dụng HTML table để biểu diễn kết quả từ CSDL-->
        <table class="table table-bordered table-hover table-responsive">
            <tr>
                <th>Tên</th>
                <td><?php echo $row['name'];?></td>
            </tr>
            <tr>
                <th>Mô tả</th>
                <td><?php echo $row['description'];?></td>
            </tr>
            <tr>
                <th>Giá</th>
                <td><?php echo $row['price'];?></td>
            </tr>
            <tr>
                <th>Hình ảnh</th>
                <td><img src="<?php echo $row['image'];?>" alt=""/></td>
            </tr>
            <tr>
                <th colspan="2">
                    <a href="index.php" class="btn btn-danger">Quay lại danh sách SP</a>
                </th>
            </tr>
        </table>
        <?php
        }else{
            echo "<div class='alert alert-danger'>Không có sản phẩm nào phù hợp theo ID.</div>";
        }
        } else{
            echo "<div class='alert alert-danger'>Sản phẩm này không tồn tại</div>";
        }
        ?>
    </div>
</body>
</html>