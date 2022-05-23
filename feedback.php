<?php 
    include("includes/database/connection.php");
    include("includes/layout/header.php");
    $sql = "SELECT * FROM feedbacks";
    $result = mysqli_query($connection, $sql);
    $feedBacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<main>
    <div class="container d-flex flex-column align-items-center">

        <h2>Feedback</h2>
        <?php if(empty($feedBacks)): ?>
        <p class="lead mt-3">There is no feedback</p>
        <?php endif; ?>
        <?php foreach($feedBacks as $item): ?>
        <div class="card my-3 w-75 text-center">
            <div class="card-body">
                <?php echo $item["feedback"]; ?>
                <div class="text-secondary mt-2">
                    By <?php echo $item["name"];?> <i>on</i> <?php echo $item["date"];?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</main>
<?php include("includes/layout/footer.php");?>