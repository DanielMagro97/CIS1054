<div>
    <?php require('data.php'); ?>
    
    <ul class="menu-list">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="list.php">View Products</a></li>
        <li class="drop-down">
            <a href="#">Categories</a>
            <ul>
                <?php
                    foreach($categories as $key => $category){
                        echo '<li>';
                            echo '<a href="search.php?categoryid=' . $key . '">';
                                echo $categories[$key][1];
                            echo '</a>';
                        echo '</li>';
                    }
                ?>
            </ul>
        </li>
    </ul>
</div>