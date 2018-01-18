<html>

    <?php require('head.php') ?>

    <?php require('data.php'); ?>

    <body>

        <?php include('menu.php') ?>

        <div id="product_details">
            <?php
                if(isset($_GET['pid'])){
                    $pid = $_GET['pid'];
                
                    if(isset($products[$pid])){
                        echo '<div "id=prod-img">';
                            // Image
                            echo '<img src=images/' . $products[$pid][4] . ' widh=500 height=500>';
                            // Image (Back)
                            echo '<img src=images/' . $products[$pid][5] . ' widh=150 height=150>';
                        echo '</div>';
                        echo '<div id="prod-det">';
                            // Name
                            echo '<h1>' . $products[$pid][2] . '</h1>';
                            // Link to search.php Categories Page
                            echo '<a href="search.php?categoryid=' . $products[$pid][1] . ' ">';
                                // Category Name
                                echo '<h4>' . $categories[$products[$pid][1]][1] . '</h4>';
                            echo '</a>';
                            // Description
                            echo '<p>' . $products[$pid][3] . '</p>';
                            // Price
                            echo '<p>€' . $products[$pid][6] . '</p>';
                        echo '</div>';  
                    } else{
                        echo 'Product Not Found';
                    }
                } else{
                    echo 'Product ID Not Specified';
                }               

                // Add to cart button
                echo '<form action="cart.php" method="POST">';
                    echo '<input type="hidden" name="pid" value="' .  $pid . '"/>';
                    echo '<input type="hidden" name="event" value="add" />';
                    echo '<input type="submit" class="cart-btn" value="Add to cart"" />';
                echo '</form>';

                // Back to list button
                $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'list.php';
                echo '<a href=" '. $httpReferer . ' ">Back to list</a>';
                //echo '<a href="javascript:history.back()">Go back</a>';
            ?>
        </div>
    </body>
</html>