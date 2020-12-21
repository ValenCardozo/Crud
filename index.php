<?php include("db.php") ?>
<?php include("includes/header.php") ?>
<div class="flex ">

    <div class="flex p-4">
           
        <div class="row justify-content-center align-items-center">
            
            <div class="col-md-4">

                        <?php if(isset($_SESSION['message'])) { ?>
                            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            
                            <button 
                            type="button" 
                            class="btn-close" 
                            data-bs-dismiss="alert" 
                            aria-label="Close">
                            </button>
                            
                            </div>
                        
                        <?php session_unset(); } ?>

                        <div class="card card-boddy p-4 ">
                            <form action="save_task.php" method="POST">
                                
                                <div class="form-group my-2">
                                    <input 
                                    type="text" 
                                    name="title" 
                                    class="form-control"
                                    placeholder="Task Title" 
                                    autofocus>
                                </div>
                                
                                <div class="form-group my-2">
                                    <textarea 
                                    name="description" 
                                    rows="2" 
                                    class="form-control"
                                    placeholder="Task Description"
                                    >
                                    </textarea>
                                </div>
                                
                                <input 
                                type="submit" 
                                class="btn btn-success btn-block" 
                                name="save_task"
                                value="Save Task">
                            
                            </form>
                        </div>

            </div>
            
            <div class="col-md-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $query = "SELECT * FROM task";
                            $resul_tasks =mysqli_query($conn, $query);
                            
                            while($row = mysqli_fetch_array($resul_tasks)) { ?>
                                    <tr>
                                        <td> <?php echo $row['Title']; ?> </td>
                                        <td> <?php echo $row['Description']; ?> </td>
                                        <td> <?php echo $row['Created_AD']; ?> </td>
                                        <td>
                                            In progress
                                        </td>
                                        <td> 
                                            <a href="edit_task.php?id=<?php echo $row['ID']?>" class="btn btn-secondary">
                                                <i class="fas fa-marker"></i>
                                            </a>
                                            
                                            <a href="delete_task.php?id=<?php echo $row['ID']?>" class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        
                                        </td>
                                    </tr>



                            <?php } ?> 
                            </tbody>
                        </table>
            </div>    
            
        </div>
    </div>
</div>    
<?php include("includes/footer.php") ?>