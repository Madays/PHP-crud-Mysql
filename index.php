<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<div class="nkn-container">
    <div class="nkn-row-padding">
        <?php if(isset($_SESSION['message'])){?>
            <div class="nkn-alert nkn-<?= $_SESSION['message_type'];?>">
                <p><?= $_SESSION['message'];?></p>
            </div>
        <?php session_unset(); } ?>
        <div class="nkn-col-s12 nkn-col-m4">
            <form action="save_task.php" method="POST">
                <div class="nkn-row-padding">
                    <div class="nkn-col-s12">
                        <input class="nkn-input" type="text" name="title" placeholder="Task title" autofocus>
                    </div>
                </div>
                <div class="nkn-row-padding">
                    <div class="nkn-col-s12">
                        <textarea name="description" id="" cols="25" rows="2" placeholder="Task Description"></textarea>
                    </div>
                </div>
                <div class="nkn-row-padding">
                    <div class="nkn-col-s12 nkn-center">
                        <button class="nkn-button" name="save_task">Save Task</button>                        
                    </div>        
                </div>
            </form>   
        </div>
        <div class="nkn-col-s12 nkn-col-m8">
            <table class="nkn-table nkn-basic">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $query = "SELECT * FROM task"; 
                        $result_tasks = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>">
                                        <svg class="nkn-icon">
                                            <use xlink:href="nkn/icons/sprites/icons.svg#edit"></use>                
                                        </svg>  
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>">
                                        <svg class="nkn-icon">
                                            <use xlink:href="nkn/icons/sprites/icons.svg#trash"></use>                
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php }?>                    
                </tbody>
            </table>                                               
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
