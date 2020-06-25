<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

   $date = $_GET["date"];
   $school = $_GET["school"];
   $classselect = $_GET["classselect"];
   $room = $_GET["room"];

 $sql = "SELECT
 1 as num,
 day_screen.date,
 person_screen.schools,
 person_screen.classes,
 person_screen.rooms,
 count(DISTINCT alls.idcard) as alls,
 count(DISTINCT person_screen.idcard) as totals,
 count(DISTINCT case when (day_screen.choice1 <> 'true' and day_screen.choice2 <> 'true'  and day_screen.choice3 <> 'true' and day_screen.choice4 <> 'true'
 and day_screen.choice5 <> 'true' and day_screen.choice6 <> 'true' and day_screen.choice7 <> 'true' and day_screen.choice8 <> 'true'
 and day_screen.choice9 <> 'true' and day_screen.choice10 <> 'true' and day_screen.choice11 <> 'true') then   day_screen.idcard  end) as ok,
 count(DISTINCT case when day_screen.choice1 = 'true' and (day_screen.choice2 = 'true'  or day_screen.choice3 = 'true' or day_screen.choice4 = 'true'
 or day_screen.choice5 = 'true' or day_screen.choice6 = 'true' or day_screen.choice7 = 'true' or day_screen.choice8 = 'true'
 or day_screen.choice9 = 'true' or day_screen.choice10 = 'true' or day_screen.choice11 = 'true') then   day_screen.idcard  end) as nook,
 count(DISTINCT no_screen.idcard) as no_screen
 
 from person_screen
 INNER join day_screen on person_screen.idcard = day_screen.idcard
 INNER JOIN (SELECT 
 *
 from person_screen
 
 where 
  schools = '".$school."'
 and classes = '".$classselect."'
 and rooms = '".$room."')alls on person_screen.schools  = alls.schools AND
 person_screen.classes  = alls.classes AND
 person_screen.rooms  = alls.rooms
 left join (SELECT
day_screen.date,
person_screen.schools,
person_screen.classes,
person_screen.rooms,


 person_screen.idcard


from person_screen
left join day_screen on person_screen.idcard = day_screen.idcard


 
where day_screen.date = '".$date."'
 and person_screen.schools = '".$school."'
 and person_screen.classes = '".$classselect."'
 and person_screen.rooms = '".$room."'
and day_screen.idcard is  null)no_screen on person_screen.schools  = no_screen.schools AND
person_screen.classes  = no_screen.classes AND
person_screen.rooms  = no_screen.rooms

 where day_screen.date = '".$date."'
 and person_screen.schools = '".$school."'
 and person_screen.classes = '".$classselect."'
 and person_screen.rooms = '".$room."'
 

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
