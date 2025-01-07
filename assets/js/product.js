function product() {
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controller/product.php', true);
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send()
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            // alert(this.responseText);
            const products = JSON.parse(this.responseText);
            // console.log(products);
            const productDiv = document.getElementById('product');
            productDiv.innerHTML = ``;

            products.forEach(product => {
                const div = document.createElement('div');
                div.classList.add('product-item');
                div.innerHTML = `
                     <a class="product_img" href="productview.php?productid=${product.product_id}"> <img src="../image/${product.p_img}" alt="Product - Bag" width='350' height='450'> </a> <br>
                        Product Name: <span>${product.product_name}</span> <br>
                        Price: <span>${product.price}</span> <br>
                        <a class="add_to_cart_btn" href='../controller/addtocart.php?productid=${product.product_id}'>Add to Cart</a>
                    `;
                productDiv.appendChild(div);
            });
        }
    }
}

product();

function search() {
    const name = document.getElementById('searchInput').value;
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controller/search.php?name=' + name, true);
    xhttp.send()
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            const products = JSON.parse(this.responseText);
            // console.log(products);
            const productDiv = document.getElementById('product');
            productDiv.innerHTML = ``;

            products.forEach(product => {
                const div = document.createElement('div');
                div.classList.add('product-item');
                div.innerHTML = `
                         <a class="product_img" href="productview.php?productid=${product.product_id}"> <img src="../image/${product.p_img}" alt="Product - Bag" width='350' height='450'> </a> <br>
                            Product Name: <span>${product.product_name}</span> <br>
                            Price: <span>${product.price}</span> <br>
                            <a class="add_to_cart_btn" href='../controller/addtocart.php?productid=${product.product_id}'>Add to Cart</a>
                        `;
                productDiv.appendChild(div);
            });
        }
    }
}