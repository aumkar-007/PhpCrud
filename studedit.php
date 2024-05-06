<?php
  session_start();
  require'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5" style="width: 70%;">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Student Edit
                <a href="index.php" class="btn btn-danger float-end">BACK</a>
              </h4>
            </div>
            <div class="card body" style="padding: 10px;">
                <?php
                if(isset($_GET['id'])){
                    $student_id= mysqli_real_escape_string($con, $_GET['id']);
                    $query_run = "SELECT *FROM students WHERE id='$student_id' ";
                    $result_run = mysqli_query($con,$query_run);

                    if(mysqli_num_rows($result_run) > 0)
                    {
                    $row_run = mysqli_fetch_array($result_run);
                    ?>
                    <form action="code.php" method="POST">
                        <input type="hidden" name="student_id" value="<?= $student_id?>">

                        <div class="mb-3" >
                        <label>Student name</label>
                        <input type="text" name="name" value="<?=$row_run['name'];?>" class="form-control">
                        </div>

                        <div class="mb-3">
                        <label>Student Email</label>
                        <input type="email" name="email" value="<?=$row_run['email'];?>" class="form-control">
                        </div>

                        <div class="mb-3">
                        <label>Student Phone</label>
                        <input type="text" name="phone" value="<?=$row_run['phone'];?>" class="form-control" style="padding-top: 10px;">
                        </div>

                        <div class="mb-3">
                        <label>Student Course</label>
                        <input type="text" name="course" value="<?=$row_run['course'];?>" class="form-control">
                        </div>

                        <div class="mb-3">
                        <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                        </div>

                        </form>
                    <?php
                    }
                    else{
                        echo "<h4>No such id found</h4>";
                    }
                }
                ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>