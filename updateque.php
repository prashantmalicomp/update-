<?php
/*** Create By Chetan C. ****/
session_start();
if(isset($_SESSION["user"]))
{
?>

<html>
<head>

<link href="assets/css/style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">


<link href="assets/css/style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    
<script type="text/javascript"></script>
<script>

	 $(document).ready(function(){
    $('.collapsible').collapsible();
  });

	 $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
</script>
<style>
        .option
        {
            padding:3px 0px;
        }
        
    </style>

</head>
<body>

<?php

$con = new mysqli("localhost","root","","siom");

if($con->connect_error)
{
    die("Connection Failed :".$con->connect_error);
}

$sql = "SELECT que_id,que,op_1,op_2,op_3,op_4,answer FROM question";
$res = $con->query($sql);


if ($res->num_rows > 0)  	
{
	$cnt = 1;
	echo "<div><div style='width:80%; margin: 0 auto;'>";
	echo "<br><h5 align='center'>EDIT QUESTION</h5><br>";
	echo "<ul class='collapsible popout' data-collapsible='accordion'>";
    while($row=$res->fetch_assoc()) 
    {
    			
	   				
    				echo "<li>";
      				echo "<div class='collapsible-header cyan row'>
      				<div class='col s12 m10 l10'><i class='material-icons'>question_answer</i><b>".$row["que"]."</b></div>
      				<div class='col s2 m2 l2 '><a href='update.php?t=". $row["que_id"]."''><button tyepe='button' class='right btn-flat red white-text'>EDIT</button></a></div>
      				</div>";
              

      				echo "<div class='collapsible-body'>";
      				echo "<div class='option'>".$row['op_1'];
      				if($row["op_1"]==$row["answer"])
      				echo "<span style='color:green ;float:right;'><i class='material-icons'>check_box</i></span>";
      				echo "<hr></div>";

      				echo "<div class='option'>".$row['op_2'];
      				if($row["op_2"]==$row["answer"])
      				echo "<span style='color:green ;float:right;'><i class='material-icons'>check_box</i></span>";
      				echo "<hr></div>";

      				echo "<div class='option'>".$row['op_3'];
      				if($row["op_3"]==$row["answer"])
      				echo "<span style='color:green ;float:right;'><i class='material-icons'>check_box</i></span>";
      				echo "<hr></div>";

      				echo "<div class='option'>".$row['op_4'];
      				if($row["op_4"]==$row["answer"])
      				echo "<span style='color:green ;float:right;'><i class='material-icons'>check_box</i></span>";
      				echo "<div></li>";
      				
    	$cnt++;
    			
	}
	echo "</ul>";
	echo "</div></div>";		
}
$con->close();  
}
else
  header('location:index.php');
?>

</body>
</html>