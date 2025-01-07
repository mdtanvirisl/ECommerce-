<header>
    <nav>
        <img src="../image/logo.png" alt="Logo">

        <h2>Nokshi Kutir</h2>
        
        <div class="nav_links">
            <a href="home.php"> Home </a>
            <a href="product_list.php"> All Products </a>
            <a href="profile.php"> My Profile </a>
            <a href="eprofile.php">Update Profile</a>
            <a href="changePassword.php"> Change Password </a>
            <a href="customer_review.php"> Customer Review </a>
            <a href="order.php"> Order Info </a>
        </div>

        <a href="cart.php"><img id="cart_img" src="../image/cart.png" alt="Cart icon"></a>

        <form action="../controller/logout.php" method="post" novalidate>
            <input id="logout" type="submit" value="Logout">
        </form>
    </nav>
    
    <!-- <form action="search.php" method="POST" novalidate>
        <input type="submit" name="Search" value="Search Products">
    </form> -->

</header>