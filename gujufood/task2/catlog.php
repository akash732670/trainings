<?php
session_start();

/*session_unset();
session_destroy();*/
    $conn = mysqli_connect("localhost","root","","tblproduct");

    if(!empty($_POST["quantity"])) {
       
       $query = "SELECT * FROM tblproduct WHERE code='" . $_POST["code"] . "'";

        $result = mysqli_query($conn, $query);
        $productByCode = mysqli_fetch_assoc($result);

       $itemArray = array($productByCode["code"]=>array(
        'name'=>$productByCode["name"], 
        'code'=>$productByCode["code"], 
        'quantity'=>$_POST["quantity"],
         'price'=>$productByCode["price"], 
         'image'=>$productByCode["image"]));

      

            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
 echo "<pre>";

            print_r($_SESSION["cart_item"]);
    }
?>

<div id="product-grid">
    <div class="txt-heading">Products</div>
    <?php

    $query = "SELECT * FROM tblproduct ORDER BY id ASC";

    $result = mysqli_query($conn, $query);
    while ($product_array[] = mysqli_fetch_assoc($result)) {
        
    }
    if (!empty($product_array)) { 
        foreach($product_array as $key=>$value){
    ?>
        <div class="product-item">
            <form method="post">
            <div class="product-tile-footer">
            <input type="hidden" name="code" value="<?php echo $product_array[$key]["code"]; ?>">
            <div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
            <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
            <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" name="submit" value="Add to Cart" class="btnAddAction" /></div>
            </div>
            </form>
        </div>
    <?php
        }
    }
    ?>
</div>