<?php 
 
include_once 'config.php'; 
  
$query = $conn->query("SELECT * FROM products ORDER BY id ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "products_" . date('Y-m-d') . ".csv"; 
     
    $f = fopen('php://memory', 'w'); 
     
    $fields = array('ID', 'Product Name', 'Product Description', 'Product Destination', 'Dispatch Date', 'Estimated Date Of Delivery'); 
    fputcsv($f, $fields, $delimiter); 
     
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['pname'], $row['pdesc'], $row['pdest'], $row['dsent'], $row['darrive']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    fseek($f, 0); 

    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
 
    fpassthru($f); 
} 
exit; 
 
?>