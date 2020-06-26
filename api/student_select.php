<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';


   $school = $_GET["school"];
   $classselect = $_GET["classselect"];
   $room = $_GET["room"];

 $sql = "SELECT
 person_screen.idcard,
 person_screen.name,
 person_screen.lastname


from person_screen
left join day_screen on person_screen.idcard = day_screen.idcard


 
where 
person_screen.schools = '".$school."'
and person_screen.classes = '".$classselect."'
and person_screen.rooms = '".$room."'
and day_screen.idcard is  null

";


$return_arr = array();

if ($result = mysqli_query( $conn, $sql )){
    while ($row = mysqli_fetch_assoc($result)) {
	
     array_push($return_arr,$row);
   }
 }

mysqli_close($conn);

echo json_encode($return_arr);








?>
