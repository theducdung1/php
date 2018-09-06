<?php
require "database.php";
class Product extends Database
{
    //Khai báo các thuộc tính của sản phẩm
    public $product_id;
    public $name;
    public $description;
    public $price;
    //.....
    
    //Xây dựng hàm khởi tạo (Constructor): Khởi tạo đối tượng 
    //và gán giá trị cho các thuộc tính
    public function __construct(){
        parent::__construct(); 
    }
    //Xây dựng các hàm thành phần (method)
    public function fetchAll(){
        $query = "SELECT * FROM products";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num > 0){
            return $stmt;
        }else{
            return null;
        }
    }

    public function fetchOne(){
        $query = "SELECT name, description, price, image FROM products WHERE product_id = ? LIMIT 0,1";
        $stmt = $this->con->prepare($query);

        //Xử lý làm sạch dữ liệu
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $stmt->bindParam(1, $this->product_id);
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num>0){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            return null;
        }
    }

    public function deleteProductById(){
        $query = "DELETE FROM products WHERE product_id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->product_id)));
        if($stmt->execute()){
            return true;
        }else {
            return false;
        }
    }
}
?>