<html>

    <?php require('head.php'); ?>

    <?php require('data.php'); ?>

    <body>

        <?php include('menu.php') ?>

        <div id="page-wrap">
            <h1>
                Search for products
            </h1>

            <div>
                <?php 
                    if(isset($_GET['categoryid'])){
                        $categoryid = $_GET['categoryid'];

                        if($categoryid === ""){
                            echo "<p>You have to specify a category id</p>";
                        } else {
                            echo "<h3>You have searched for products in the following category: " . $categories[$categoryid][1] . "</h3>";

                            echo '<ul class="products">';
                                echo '<li>';
                                foreach ($products as $key => $shirt) {
                                    if($shirt[1] === $categoryid){
                                        echo '<a href="#">';
                                            // Link to details.php Details Page
                                            echo '<a href="details.php?pid=' . $key . ' ">';
                                                // Image
                                                echo '<img src=images/' . $shirt[4] . ' widh=100 height=100>';
                                                // Name
                                                echo '<h3>' . $shirt[2] . '</h3>';
                                            echo '</a>';
                                            // Price
                                            echo '<p>€' . $shirt[6] . '</p>';
                                        echo '</a>';
                                        /**/echo '</li><li>';
                                    }
                                }
                                echo '</li>';
                            echo '</ul>';   
                        }
                    } else {
                        echo "<p>You have to specify a search category id</p>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>