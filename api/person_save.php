<?php
header('Access-Control-Allow-Origin: *');
include 'conn.php';


$idcard = $_GET["idcard"];
$name = $_GET["name"];
$lastname = $_GET["lastname"];
$nickname = $_GET["nickname"];
$age = $_GET["age"];
$schools = $_GET["school"];
$classes = $_GET["classselect"];
$rooms=  $_GET["room"];
$tel=  $_GET["tel"];
$guardian=  $_GET["guardian"];
$guardian_tel=  $_GET["guardian_tel"];
$relate= $_GET["relate"];
$address=  $_GET["address"];
$cometo=  $_GET["cometo"];	
$teacher=  $_GET["teacher"];	





	



        $strvisit  = "  INSERT INTO person_screen(idcard,name,lastname,nickname,age,schools,classes,
        rooms,tel,guardian,guardian_tel,relate,address,cometo,
        teacher,d_update
        ) 
       VALUES('".$idcard."','".$name."','".$lastname."','".$nickname."','".$age."','".$schools."','".$classes."',
       '".$rooms."','".$tel."','".$guardian."','".$guardian_tel."','".$relate."','".$address."', '".$cometo."',
       '".$teacher."',CURRENT_TIMESTAMP
       )";
        if ($conn->query($strvisit) === TRUE) {
           
            
            $return_message = array();
            $row_array['message'] = "เพิ่มข้อมูลสำเร็จ";
            array_push($return_message,$row_array);
        
        
        } else {
          
            $return_message = array();
            $row_array['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
            array_push($return_message,$row_array);
            
        }



      
mysqli_close($conn);
	
echo json_encode($return_message);

?>