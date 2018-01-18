<html>

    <?php require('head.php') ?>

    <body>

        <?php include('menu.php') ?>

        <?php

            if(isset($_GET['message'])){
                $message = $_GET['message'];
            }

            if (isset($_POST["submit"])){
                $commentsFile = fopen("comments.txt", "a+");
                
                if(isset($_POST['email'])){
                    $email = $_POST['email'];
                }
                if(isset($_POST['comment'])){
                    $comment = $_POST['comment'];
                }
                
                fwrite($commentsFile, 'From: ' . $email . ': '. $comment . PHP_EOL);
                fclose($commentsFile);

                
                header('Location: hello.php?message=Message was submitted');


                // PHPMailer
                require ('PHPMailer\PHPMailerAutoload.php');
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'admin@um.edu.mt';
                $mail->Password = 'Password';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('no-reply@tshirtshop.com', 'T-Shirt Shop');
                $mail->addAddress('youremail@emailserver.com', 'Mail Server');
                $mail->Subject  = $type;
                $mail->Body     = 'User email: ' . $email . 'Comment: ' . $comment . PHP_EOL;
                if(!$mail->send()) {
                    echo 'Message was not sent.';
                    echo 'Mailer error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent.';
                }
            }
        ?>

        <div id="page-wrap">
            <h1>
                Contact Form
            </h1>


            <div>
                <form action="hello.php" method="post">
                    <div>
                        <label for="email">Email address</label><br/>
                        <input type="email" name="email" placeholder="Enter email">
                    </div>

                    <div>
                        <label for="comment">Your comment</label><br/>
                        <input type="text" name="comment" placeholder="Comment...">
                    </div>

                     <div>
                        <?php
                            $type='';
                            if(isset($_GET['type'])){
                                $type = $_GET['type'];
                            }
                        ?>
                        <select>
                            <option <?=$type == 'General' ? 'selected="selected"' : '';?>value="general">General</option>
                            <option <?=$type == 'Complaints' ? 'selected="selected"' : '';?>value="complaints">Complaints</option>
                            <option <?=$type == 'Returns' ? 'selected="selected"' : '';?>value="returns">Returns</option>
                            <option <?=$type == 'Ideas' ? 'selected="selected"' : '';?>value="ideas">Ideas</option>
                        </select>
                    </div>

                    <button type="submit" name="submit">Submit</button>
                </form>

                <?php
                    if(isset($message)){
                        echo($message);
                    }
                ?>

            </div>
        </div>
    </body>
</html> 