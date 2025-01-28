<?php $server_name="localhost";
$username="root";
$password="";
$database_name="vippass";

$conn= mysqli_connect ($server_name,$username,$password,$database_name);
//check the conection
if(!$conn)
{
    die("Connection failed:" . mysqli_connect_error());
} ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="" class="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <style>
    header {
        height: 100px;
        padding-top: 25px;
        background-color: orange;
        text-align: center;
    }

    .date {
        background-color: orange;
        text-align: right;
        padding-right: 100px;
    }

    nav {
        text-align: right;
        text-decoration: none;
        background-color: orange;
        padding-right: 150px;
        color: white;
        height: 50px;
        align-items: center;
    }
    </style>

</head>

<body>
    <header>
        <h1>Maruti Mandir ,Umbraj</h1>
        <h3>Contact Us Reports</h3>
    </header>
    <div class="date">
        <h3><?php
    $cdate=date("d-m-y");//CURUNT DATE
    echo "Date:  $cdate";
    ?></h3>
    </div>

    <nav>
        <!--nav bar -->


        <a href="admin/admin_panel.php" style="text-decoration:none;color:white">Logout</a>




    </nav>



    <div class="contianer">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Full_name</th>
                    <th scope="col">Mobile_no</th>
                    <th scope="col">Email</th>
                    <th scope="col">Massege</th>

                </tr>
            </thead>
            <tbody>

                <?php


  $sql = "select * from `contact_us`";
  $result = mysqli_query($conn, $sql);
 
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
 
    

      echo " <tr>
      <th scope='row'>".$row['Full_name']."</th>
      <td>". $row['Mobile_no']."</td>
      <td>".$row['Email']."</td>
      <td>".$row['Massege']."</td>
    </tr>";
    }
  } else {
    die("error" . mysqli_connect_error());
  }

?>
                <!-- <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr> -->
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>