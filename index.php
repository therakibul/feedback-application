<?php 
    include("includes/database/connection.php");
    include("includes/layout/header.php");

?>

<main>
    <div class="container d-flex flex-column align-items-center">
        <?php  
            $name = $email = $feedback = "";
            $nameErr = $emailErr = $feedbackErr = "";
            if(isset($_POST["submit"])){
                // validate name
                if(empty($_POST["name"])){
                    $nameErr = "Name can't be blank";
                }else{
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                }

                if(empty($_POST["email"])){
                    $emailErr = "Email can't be blank";
                }else{
                    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                }

                if(empty($_POST["feedback"])){
                    $feedbackErr = "Feedback can't be blank";
                }else{
                    $feedback = filter_input(INPUT_POST, "feedback", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                }

                // Add recored
                if(empty($nameErr) && empty($emailErr) && empty($feedbackErr)){
                    $sql = "INSERT INTO feedbacks (name, email, feedback) VALUES('{$name}', '{$email}', '{$feedback}')";
                    if(mysqli_query($connection, $sql)){
                        header("Location: feedback.php");
                    }else{
                        echo "Can't added your record ". mysqli_error();
                    }
                }
            }
           
            
        ?>
        <h2>Feedback</h2>
        <p class="lead text-center">Leave your feedback for more improvement</p>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="mt-4 w-75">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control <?php echo $nameErr ? 'is-invalid' : null;?>" id="name"
                    name="name" placeholder="Enter your name">
                <div class="invalid-feedback">
                    <?php echo $nameErr;?>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid' : null;?>" id="email"
                    name="email" placeholder="Enter your email">
                <div class="invalid-feedbac">
                    <?php echo $emailErr;?>
                </div>
            </div>
            <div class="mb-3">
                <label for="feedback" class="form-label">Feedback</label>
                <textarea class="form-control <?php echo $feedbackErr ? 'is-invalid' : null;?>" id="feedback"
                    name="feedback" placeholder="Enter your feedback"></textarea>
                <div class="invalid-feedback">
                    <?php echo $feedbackErr;?>
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
            </div>
        </form>
    </div>
</main>
<?php include("includes/layout/footer.php");?>