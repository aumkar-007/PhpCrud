<?php
  session_start();
  require'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5" style="width: 70%;">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Student View
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

                        <div class="mb-3" >
                        <label>Student name</label>
                        <p class="form-control">
                        <?=$row_run['name'];?>
                        </p>
                        </div>

                        <div class="mb-3">
                        <label>Student Email</label>
                        <p class="form-control">
                        <?=$row_run['email'];?>
                        </p>
                        </div>

                        <div class="mb-3">
                        <label>Student Phone</label>
                        <p class="form-control" style="padding-top: 10px;">
                        <?=$row_run['phone'];?>
                        </p>
                        </div>

                        <div class="mb-3">
                        <label>Student Course</label>
                        <p class="form-control">
                        <?=$row_run['course'];?>
                        </p>
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