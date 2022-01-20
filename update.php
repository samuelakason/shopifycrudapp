<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $pname = $_POST['pname'];

        $id = $_POST['id'];

        $pdesc = $_POST['pdesc'];

        $pdest = $_POST['pdest'];

        $dsent = $_POST['dsent'];

        $darrive = $_POST['darrive']; 

        $sql = "UPDATE `products` SET `pname`='$pname',`pdesc`='$pdesc',`pdest`='$pdest',`dsent`='$dsent',`darrive`='$darrive' WHERE `id`='$id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $sql = "SELECT * FROM `products` WHERE `id`='$id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $pname = $row['pname'];

            $pdesc = $row['pdesc'];

            $pdest = $row['pdest'];

            $dsent  = $row['dsent'];

            $darrive = $row['darrive'];

            $id = $row['id'];

        } 

    ?>

        <h2>Product Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            Product Name :  <input type="text" name="pname" value="<?php echo $pname; ?>">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <br>
            <br>

            Product Description : <input type="text" name="pdesc" value="<?php echo $pdesc; ?>">

            <br>
            <br>

            Product Destination : <input type="text" name="pdest" value="<?php echo $pdest; ?>">

            <br>
            <br>

            Dispatch Date : <input type="text" name="dsent" value="<?php echo $dsent; ?>">

            <br>
            <br>

            Estimated Date Of Delivery : <input type="text" name="darrive" value="<?php echo $darrive; ?>">

            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 
