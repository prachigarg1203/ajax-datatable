<?php 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'datatable' 
); 
 
// DB table to use 
$table = 'members'; 
 
// Table's primary key 
$primaryKey = 'id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'photo', 'dt' => 1 ),
    array( 'db' => 'file_path', 'dt' => 2 ),
    array( 'db' => 'first_name', 'dt' => 3 ), 
    array( 'db' => 'last_name',  'dt' => 4 ), 
    array( 'db' => 'email',      'dt' => 5 ), 
    array( 'db' => 'gender',     'dt' => 6 ), 
    array( 'db' => 'country',    'dt' => 7 ), 
    array( 
        'db'        => 'created', 
        'dt'        => 8, 
        'formatter' => function( $d, $row ) { 
            return date( 'jS M Y', strtotime($d)); 
        } 
        
    ), 

    array( 
        'db'        => 'id', 
        'dt'        => 9, 
        'formatter' => function( $d, $row ) { 
            return ' 
                <button class="edit-btn" id ="'.$d.'">Edit</button>&nbsp; 
                <button class="delete-btn" id="'.$d.'">Delete</button> 
            '; 
        } 
    )
    // array( 
    //     'db'        => 'status', 
    //     'dt'        => 6, 
    //     'formatter' => function( $d, $row ) { 
    //         return ($d == 1)?'Active':'Inactive'; 
    //     } 
    // ) 
); 

// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);
?>