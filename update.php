<?php
session_start();
if(isset($_SESSION["user"]))
{
?>
<html>  
<head>    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->

  <!--Import Google Icon Font-->
    <link href="assets/css/style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


<!-- Include CSS for icons. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<!-- Include Editor style. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

<!-- Create a tag that we will use as the editable area. -->
<!-- You can use a div tag as well. -->

<!-- Include jQuery lib. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script>
  $(function() {
    $('textarea').froalaEditor()
  });
     
       $(document).ready(function()
        {
            $('.modal').modal();
        });
    </script>
</head>  
<body>
<?php

  $id = $_REQUEST["t"];
  $conn=new mysqli("localhost","root","","siom");
  if(!$conn)
  {
    die("Unable to connect". $conn->connect_error);
  }
  $sql = "SELECT * FROM question WHERE que_id = '".$id."'";
  $res = $conn->query($sql);
  $v=$res->fetch_assoc();
  {
?>
     
<div>
	<div style="width:50%; margin: 0 auto;">
        <form method="POST" action="#">
                        
                
                <input type="hidden" name="que_id" value="<?php echo $v['que_id']; ?>" ><br />
                <label>Question</label>
                
                <input type="text" name="que" id="que" class="form-control" value="<?php echo $v['que']; ?>"><br />
                

                <label>Option 1</label>
               
                <input type="text" name="op_1" id="op_1" class="form-control" value="<?php echo $v['op_1']; ?>"><br />
                

                <label>Option 2</label>
                <input type="text" name="op_2" id="op_2" class="form-control" value="<?php echo $v['op_2']; ?>"><br />

                <label>Option 3</label>
                <input type="text" name="op_3" id="op_3" class="form-control" value="<?php echo $v['op_3']; ?>"><br />

                <label>Option 4</label>
                <input type="text" name="op_4" id="op_4" class="form-control" value="<?php echo $v['op_3']; ?>"><br />

                <label>Answer</label>
                <input type="text" name="answer" id="answer" class="form-control" value="<?php echo $v['answer']; ?>"><br />

                <button class="btn waves-effect waves-light" type="submit" name="submit" align="center">UPDATE
    			<i class="material-icons right">send</i>
                
              </form>
 </div>
 </div>   
  <?php
}
?>

 <?php
  if(isset($_POST["submit"]))
  {

  	$i = $_REQUEST["que_id"];
  	$q = $_REQUEST["que"];
  	$op1 = $_REQUEST["op_1"];
  	$op2 = $_REQUEST["op_2"];
  	$op3 = $_REQUEST["op_3"];
  	$op4 = $_REQUEST["op_4"];
  	$ans = $_REQUEST["answer"];

  	 $conn=new mysqli("localhost","root","","siom");
  if(!$conn)
  {
    die("Unable to connect". $conn->connect_error);
  }

  	$sql = "UPDATE question SET que = '".$q."',op_1 = '".$op1."',op_2 = '".$op2."',op_3 = '".$op3."',
  			op_4 = '".$op4."',answer = '".$ans."' WHERE que_id = '".$i."'";

     if($conn->query($sql))
     echo "<script>alert('Question Updated Successfully');</script>";
     else
     	echo "failed";
  
  $conn->close();

  header('Refresh: 1; url=http://localhost:81/popout.php');

  }
}
else
  header('location:index.php');
?>    
