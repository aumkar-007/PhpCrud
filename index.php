<?php
  session_start();
  require 'dbcon.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  <div class="container mt-5" style="width: 90%;">
    <?php 
    include('message.php');
    ?>
    <div class="row justify-content-center align-items-center g-2">
      <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Student Details
           <a href="studcreate.php" class="btn btn-primary float-end">Add Students</a>
          </h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Course</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM students";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) 
                {
                    foreach ($query_run as $row)
                    {
                      ?>
                      <tr>
                      <td><?= $row['id'];?></td>
                      <td><?= $row['name'];?></td>
                      <td><?= $row['email'];?></td>
                      <td><?= $row['phone'];?></td>
                      <td><?= $row['course'];?></td>
                      <td>
                        <a href="studview.php?id=<?= $row['id'];?>" class="btn btn-info btn-sm">View</a>
                        <a href="studedit.php?id=<?= $row['id'];?>" class="btn btn-success btn-sm">Edit</a>
                        <form action="code.php" method="$POST" class="d-inline">
                        <button type="submit" name="delete_student" value="<?= $row['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                      </td>
                      </tr>
                      <?php
                    }
                }
                else 
                {
                  echo"No record found";
                }
                ?>
              </tbody>
            </table>
          </div>
      </div>
      </div>
    </div>
  </div>
  



</html>