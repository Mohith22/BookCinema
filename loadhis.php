<?php
	 session_start();
$conn = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("BookMovie", $conn); // Selecting Database from Server
	if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }else{
				$userid = $_POST['userid'];

						$query = mysql_query("select MovieName,Seat from (tickets natural join movieinfo) where tickets.UserId = $userid order by tickets.TicketId desc ") ;
 						//echo mysql_error();
					    $emparray = array();
					    while($row =mysql_fetch_assoc($query))
					    {
					        $emparray[] = $row;
					        ;
					    }
					    //echo $emparray[2]['Seat'];
		
		//echo("<script>console.log('PHP: json_encode(".$emparray.")');</script>");
		echo json_encode($emparray);
	}
	mysql_close($conn);
?>