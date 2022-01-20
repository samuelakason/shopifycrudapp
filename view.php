<?php 

include "config.php";

$sql = "SELECT * FROM products";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Home Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Product Log</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Product Name</th>

        <th>Product Description</th>

        <th>Product Destination</th>

        <th>Dispatch Date</th>

        <th>Estimated Date Of Delivery</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['pname']; ?></td>

                    <td><?php echo $row['pdesc']; ?></td>

                    <td><?php echo $row['pdest']; ?></td>

                    <td><?php echo $row['dsent']; ?></td>

                    <td><?php echo $row['darrive']; ?></td>

                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

<?php       
        
    }

  }

?>                

    </tbody>

</table>

<form action="create.php">
    <button class="button btn" >Add New Product</button>
</form>

<br>

<form action="exportData.php">
    <button class="button btn" >Export Product Data</button>
</form>


</div> 

</body>

</html>
