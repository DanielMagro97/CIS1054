<html>

    <?php require('head.php') ?>

    <?php require('data.php'); ?>

    <body>

        <?php include('menu.php') ?>

        <div id="cart">
            <?php
                $pid = '';
                if(isset($_POST['pid'])){
                    $pid = $_POST['pid'];
                }

                $event = '';
                if(isset($_POST['event'])){
                    $event = $_POST['event'];
                }

                // Choosing which action to perform (add/remove item)
                switch ($event){
                    case "add":
                        if (empty($_SESSION["cart"][$pid])){
                            $_SESSION["cart"][$pid] = 1;
                        } else {
                            $_SESSION["cart"][$pid] += 1;
                        }
                        break;
                    case "remove":
                        if (!empty($_SESSION["cart"][$pid])){
                            $_SESSION["cart"][$pid] -= 1;
                            if ($_SESSION["cart"][$pid] === 0){
                                unset($_SESSION["cart"][$pid]);
                            }
                        }
                        break;
                    default:
                        echo 'Unexpected Event';
                        break;
                }

                if(isset($_SESSION["cart"])){
                    // Showing the current contents of the Cart. Offering to Remove an item
                    if (count($_SESSION["cart"]) > 0){
                        foreach ($_SESSION["cart"] as $key => $qty){
                            echo 'Product: ' . $products[$key][2] . ' Price: €' . $products[$key][6] . ' Quantity: ' . $_SESSION["cart"][$key];
                            // Remove from cart button
                            echo '<form action="cart.php" method="POST">';
                                echo '<input type="hidden" name="pid" value="' . $key . '"/>';
                                echo '<input type="hidden" name="event" value="remove" />';
                                echo '<input type="submit" class="cart-btn" value="Remove 1 from cart"" />';
                            echo '</form>';
                        }
                    } else {
                        echo '<h4>Cart is empty</h4>';
                    }
                }

                // Back to Products Button
                echo '<a href="list.php">Back to Products</a>';
            ?>
        </div>
    </body>
</html>            