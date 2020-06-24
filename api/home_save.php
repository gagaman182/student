<?php
header('Access-Control-Allow-Origin: *');
include 'conn.php';


$date = $_GET["date"];
$idcard = $_GET["idcard"];
$choice1 = $_GET["choice1"];
$choice2 = $_GET["choice2"];
$choice3 = $_GET["choice3"];
$choice4 = $_GET["choice4"];
$choice5 = $_GET["choice5"];
$choice6 = $_GET["choice6"];
$choice7=  $_GET["choice7"];
$choice8=  $_GET["choice8"];
$choice9=  $_GET["choice9"];
$choice10=  $_GET["choice10"];
$choice11= $_GET["choice11"];
$choice_other=  $_GET["choice_other"];
$history1=  $_GET["history1"];	
$history2=  $_GET["history2"];	
$history3=  $_GET["history3"];
$history4=  $_GET["history4"];
$history5=  $_GET["history5"];





	



        $strvisit  = "  INSERT INTO day_screen(date,idcard,choice1,choice2,choice3,choice4,choice5,choice6,
        choice7,choice8,choice9,choice10,choice11,choice_other,history1,history2,history3,history4,history5,d_update) 
       VALUES('".$date."','".$idcard."','".$choice1."','".$choice2."','".$choice3."','".$choice4."','".$choice5."','".$choice6."',
       '".$choice7."','".$choice8."','".$choice9."','".$choice10."','".$choice11."','".$choice_other."', '".$history1."',
       '".$history2."','".$history3."','".$history4."','".$history5."',CURRENT_TIMESTAMP)";
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