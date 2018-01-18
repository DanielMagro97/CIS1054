<html>

    <?php require('head.php') ?>

    <?php require('data.php'); ?>

    <body>

        <?php include('menu.php') ?>

        <div id="page-wrap">
            <h1>
                Products
            </h1>

            <div>
                <?php
                    echo '<ul class="products">';
                    foreach ($products as $key => $shirt) {
                        echo '<li>';
                            echo '<a href="#">';
                                // Link to details.php Details Page
                                echo '<a href="details.php?pid=' . $key . ' ">';
                                    // Image
                                    echo '<img src=images/' . $shirt[4] . ' widh=100 height=100>';
                                    // Name
                                    echo '<h3>' . $shirt[2] . '</h3>';
                                echo '</a>';
                                // Link to search.php Categories Page
                                echo '<a href="search.php?categoryid=' . $shirt[1] . ' ">';
                                    // Category Name
                                    echo '<h4>' . $categories[$shirt[1]][1]. '</h4>';
                                echo '</a>';
                                // Price
                                echo '<p>€' . $shirt[6] . '</p>';
                            echo '</a>';
                        echo '</li>';
                    }
                    echo '</ul>';
                ?>
            </div>
        </div>
    </body>
</html>