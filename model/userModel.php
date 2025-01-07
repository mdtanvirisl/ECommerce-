<?php
    require_once('db.php');
    
    function login($username, $password){
        $con = getConnection();
        $sql = "SELECT * FROM login WHERE UserName=? AND Password=?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        $count = mysqli_num_rows($result);
        $user = mysqli_fetch_array($result);
        
        if($count == 1){
            session_start();
            $_SESSION['user'] = ['username' => $user['UserName'], 'password' => $user['Password'] ];
            return true;
        } else {
            return false;
        }
    }

    function register($customer) 
    {
        $con = getConnection();
        $sqlCheckUsername = "SELECT * FROM customerinfo WHERE UserName=?";
        $stmtCheckUsername = mysqli_prepare($con, $sqlCheckUsername);
        mysqli_stmt_bind_param($stmtCheckUsername, "s", $customer['username']);
        mysqli_stmt_execute($stmtCheckUsername);
        $resultCheckUsername = mysqli_stmt_get_result($stmtCheckUsername);
        $count = mysqli_num_rows($resultCheckUsername);

        if ($count == 1) {
            return "Username is already taken";
        }

        $auth = ['username' => $customer['username'], 'password'=>$customer['password']];

        $result = addcustomer($customer);
        $login = addAuth($auth);

        if ($result && $login) {
            header('location: ../view/login.php');
        } else {
            return "Database error!";
        }
    }

    // Function to add authentication with prepared statement
    function addAuth($auth){
        $con = getConnection();
        $sql = "INSERT INTO login (UserName, Password) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $auth['username'], $auth['password']);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
    
    function getAuth($username) {
        $con = getConnection();
        $sql = "SELECT * FROM login WHERE UserName = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $auth = mysqli_fetch_array($result);
        return $auth['Password'];
    }
    
    function addcustomer($user) {
        $con = getConnection();
        $sql = "INSERT INTO customerinfo (Name, Email, Number, Gender, UserName, Ques1, Ques2, Address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssss", $user['name'], $user['email'], $user['number'], $user['gender'], $user['username'], $user['ques1'], $user['ques2'], $user['address']);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
    
    function getUser($username) {
        $con = getConnection();
        $sql = "SELECT * FROM customerinfo WHERE UserName = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }


    function updateImage($username, $image) {
        $con = getConnection();
        $sql = "UPDATE customerinfo SET Img = ? WHERE UserName = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $image, $username);
        mysqli_stmt_execute($stmt);
        return true;
    }
    
    function updateProfile($user) {
        $name = $user["name"];
        $email = $user["email"];
        $number = $user["number"];
        $address = $user["address"];
        $ques1 = $user["ques1"];
        $ques2 = $user["ques2"];
        $username = $user["username"];
    
        $con = getConnection();
        $sql = "UPDATE customerinfo SET Name = ?, Email = ?, Number = ?, Address = ?, Ques1 = ?, Ques2 = ? WHERE UserName = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $number, $address, $ques1, $ques2, $username);
        $result = mysqli_stmt_execute($stmt);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getAllProduct() {
        $con = getConnection();
        $sql = "SELECT * FROM product";
        $result = mysqli_query($con, $sql);
        $products = [];
    
        while ($product = mysqli_fetch_assoc($result)) {
            array_push($products, $product);
        }
    
        return $products;
    }
    
    function updatePassword($username, $password) {
        $con = getConnection();
        $sql = "UPDATE login SET Password = ? WHERE UserName = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $password, $username);
        $result = mysqli_stmt_execute($stmt);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    function addtocart($product) {
        $con = getConnection();
        $sql = "INSERT INTO cart (product_id, product_name, price, p_img) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $product['product_id'], $product['product_name'], $product['price'], $product['p_img']);
        $result = mysqli_stmt_execute($stmt);
    
        return $result;
    }

    function showCart() {
        $con = getConnection();
        $sql = "SELECT * FROM cart";
        $result = mysqli_query($con, $sql);
        $products = [];
    
        while ($product = mysqli_fetch_assoc($result)) {
            array_push($products, $product);
        }
    
        return $products;
    }
    
    function removeProduct($productid) {
        $con = getConnection();
        $sql = "DELETE FROM cart WHERE product_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $productid);
        $result = mysqli_stmt_execute($stmt);
    
        return $result;
    }
    
    function getproduct($productid) {
        $con = getConnection();
        $sql = "SELECT * FROM product WHERE product_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $productid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $product = mysqli_fetch_assoc($result);
    
        return $product;
    }

    function order($product) {
        $con = getConnection();
        $sql = "INSERT INTO order_info (product_id, product_name, quantity, total_price, UserName, Name, Address, Number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssss", $product['productid'], $product['productname'], $product['quantity'], $product['total'], $product['username'], $product['name'], $product['address'], $product['number']);
        $result = mysqli_stmt_execute($stmt);
    
        return $result;
    }
    
    function showOrder($username) {
        $con = getConnection();
        $sql = "SELECT * FROM order_info WHERE UserName = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $products = [];
    
        while ($product = mysqli_fetch_assoc($result)) {
            array_push($products, $product);
        }
    
        return $products;
    }
    
    function showAllReview() {
        $con = getConnection();
        $sql = "SELECT * FROM review";
        $result = mysqli_query($con, $sql);
        $reviews = [];
    
        while ($review = mysqli_fetch_assoc($result)) {
            array_push($reviews, $review);
        }
    
        return $reviews;
    }
    
    function review($review) {
        $con = getConnection();
        $sql = "INSERT INTO review (UserName, message) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $review['username'], $review['message']);
        $result = mysqli_stmt_execute($stmt);
    
        return $result;
    }

    function searchContent($productName) { //$name, $id
        $con = getConnection();
        $sql = "SELECT * FROM product WHERE product_name LIKE '%$productName%' ";
        $result = mysqli_query($con, $sql);
        $products = [];
    
        while ($product = mysqli_fetch_assoc($result)) {
            array_push($products, $product);
        }
    
        return $products;
    }

?>






<?php

// DB Codes - Without prepared statements

    // require_once('db.php');
    
    // function login($username, $password){
    //     $con = getConnection();
    //     $sql = "select * from login where UserName='{$username}' and Password='{$password}'";
    //     $result = mysqli_query($con, $sql);
    //     $count = mysqli_num_rows($result);
    //     $user = mysqli_fetch_array($result);
        
    //     if($count == 1){
    //         // die("abc");

    //         session_start();
    //         $_SESSION['user'] = ['username' => $user['UserName'], 'password' => $user['Password'] ];
    //         return true;
    //     }else{
    //         // die("abc");
    //         return false;
    //     }
    // }

    // function register($customer) 
    // {
    //     $con = getConnection();
    //     $sql = "select * from customerinfo where UserName='{$customer['username']}'";
    //     $result = mysqli_query($con, $sql);
    //     $count = mysqli_num_rows($result);
    //     if ($count == 1) {
    //         return "Username is already taken";
    //     }
    //     $auth = ['username' => $customer['username'], 'password'=>$customer['password']];

    //     $result = addcustomer($customer);
    //     $login = addAuth($auth);

    //     if ($result && $login) {
    //         header('location: ../view/login.php');
    //     } else {
    //         return "Database error!";
    //     }
    // }

    // function addAuth($auth){
    //     $con = getConnection();
    //     $sql = "insert into login (UserName, Password) values('{$auth['username']}', '{$auth['password']}')";
    //     $result = mysqli_query($con, $sql);
    //     return $result;
    // }
    
    // function getAuth($username){
    //     $con = getConnection();
    //     $sql = "select * from login where UserName = '{$username}'";
    //     $result = mysqli_query($con, $sql);
    //     $auth = mysqli_fetch_array($result);
    //     return $auth['Password'];
    // }

    // function addcustomer($user){
    //     $con = getConnection();
    //     $sql = "insert into customerinfo (Name, Email, Number, Gender, UserName, Ques1, Ques2, Address) values('{$user['name']}', '{$user['email']}', '{$user['number']}', '{$user['gender']}', '{$user['username']}', '{$user['ques1']}', '{$user['ques2']}', '{$user['address']}' )";
    //     $result = mysqli_query($con, $sql);
    //     return $result;
    // }

    // function getUser($username){
    //     $con = getConnection();
    //     $sql = "select * from customerinfo where UserName = '{$username}'";
    //     $result = mysqli_query($con, $sql);
    //     $user = mysqli_fetch_assoc($result);
    //     return $user;
    // }

    // function updateImage($username, $image)
    // {
    //     $con = getConnection();
    //     $sql = "update customerinfo set Img='{$image}' where UserName = '{$username}' ";
    //     mysqli_query($con, $sql);
    //     return true;
    // }

    // function updateProfile($user){
    //     $name = $user["name"];
    //     $email = $user["email"];
    //     $number = $user["number"];
    //     $address = $user["address"]; 
    //     $ques1 = $user["ques1"]; 
    //     $ques2 = $user["ques2"]; 
    //     $username = $user["username"];

    //     $con = getConnection();
    //     $sql = "update customerinfo set Name='{$name}', Email='{$email}', Number= '{$number}', 
    //             Address= '{$address}', Ques1= '{$ques1}', Ques2= '{$ques2}' where UserName = '{$username}'";
    //     $result = mysqli_query($con, $sql);
        
    //     if($result){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }

    // function getAllProduct(){
    //     $con = getConnection();
    //     $sql = "select * from product";
    //     $result = mysqli_query($con, $sql);
    //     $products = [];
        
    //     while($product = mysqli_fetch_assoc($result)){
    //         array_push($products, $product);
    //     }
        
    //     return $products;
    // }
    
    // function updatePassword($username, $password){
    //     $con = getConnection();
    //     $sql = "update login set Password='{$password}' where UserName = '{$username}'";
    //     $result = mysqli_query($con, $sql);
       
    //     if($result){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }

    // function addtocart($product){
    //     $con = getConnection();
    //     $sql = "insert into cart (product_id, product_name, price, p_img)
    //             values('{$product['product_id']}', '{$product['product_name']}', '{$product['price']}', '{$product['p_img']}' )";
    //     $result = mysqli_query($con, $sql);
    //     return $result;
    // }

    // function showCart(){
    //     $con = getConnection();
    //     $sql = "select * from cart";
    //     $result = mysqli_query($con, $sql);
    //     $products = [];
        
    //     while($product = mysqli_fetch_assoc($result)){
    //         array_push($products, $product);
    //     }
        
    //     return $products;
    // }
    
    // function removeProduct($productid){
    //     $con = getConnection();
    //     $sql = "delete from cart where product_id = '{$productid}'";
    //     $result = mysqli_query($con, $sql);
    //     return $result;
    // }

    // // fetch from product
    // function getproduct($productid){
    //     $con = getConnection();
    //     $sql = "select * from product where product_id = '{$productid}'";
    //     $result = mysqli_query($con, $sql);
    //     $product = mysqli_fetch_assoc($result);
    //     return $product;
    // }

    // function order($product){
    //     $con = getConnection();
    //     $sql = "insert into order_info (product_id, product_name, quantity, total_price, UserName, Name, Address, Number)
    //             values('{$product['productid']}', '{$product['productname']}', '{$product['quantity']}', '{$product['total']}', '{$product['username']}', '{$product['name']}', '{$product['address']}', '{$product['number']}' )";
    //     $result = mysqli_query($con, $sql);
    //     return $result;
    // }

    // function showOrder($username){
    //     $con = getConnection();
    //     $sql = "select * from order_info where UserName = '{$username}' ";
    //     $result = mysqli_query($con, $sql);
    //     $products = [];
        
    //     while($product = mysqli_fetch_assoc($result)){
    //         array_push($products, $product);
    //     }
        
    //     return $products;
    // }

    // function showAllReview(){
    //     $con = getConnection();
    //     $sql = "select * from review";
    //     $result = mysqli_query($con, $sql);
    //     $reviews = [];
        
    //     while($review = mysqli_fetch_assoc($result)){
    //         array_push($reviews, $review);
    //     }
        
    //     return $reviews;
    // }

    // function review($review){
    //     $con = getConnection();
    //     $sql = "insert into review (UserName, message) values('{$review['username']}', '{$review['message']}')";
    //     $result = mysqli_query($con, $sql);
    //     return $result;
    // }

?>