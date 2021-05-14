<?php

include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
}
?>

<?php include("includes/header.php") ?>

<!-- Input Text -->
<div class="nkn-row-padding">
    <div class="nkn-col-s6 nkn-offset-s3">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="nkn-row-padding">
                <div class="nkn-col-s12">
                    <input class="nkn-input" type="text" name="title" value="<?php echo $title; ?>" placeholder="Update title">
                </div>
            </div>
            <div class="nkn-row-padding">
                <div class="nkn-col-s12">
                    <textarea name="description" rows="3" placeholder="Update description"><?php echo $description; ?></textarea>
                </div>
            </div>
            <div class="nkn-row-padding">
                <div class="nkn-col-s12 nkn-center">
                    <button class="nkn-button" name="update">Update</button>                        
                </div>        
            </div>
        </form>   
    </div>
</div>
<!-- ./Input Text -->


<?php include("includes/footer.php") ?>