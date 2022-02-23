<!DOCTYPE html>
<html>
<head>
	<title>Print Preview</title>
	<link href="css/all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<style type="text/css">
		@media print {
			#printbtn {
				display: none;
			}
		}
	</style>
</head>
	<button id="printbtn"  onClick="window.print();">Print</button>
<body>
<div class="header" style="text-align: center;">
	<img src="img/Header.png" width="960">
</div>
<div class="content" style="text-align: center; font-size: 20px;">
	<?php
	      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "universityforms");  
      $query = "SELECT * FROM forms  WHERE id = '".$_GET["id"]."'";  
      $result = mysqli_query($connect, $query);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
        if ($row['type']=='Call Up') {
          $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row['name'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Academic Number</label></td>  
                     <td width="70%">'.$row['acnumber'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Specialization</label></td>  
                     <td width="70%">'.$row['specialization'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Phone Number</label></td>  
                     <td width="70%">'.$row['phnumber'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Subject</label></td>  
                     <td width="70%">'.$row['subject'].'</td>  
                </tr>  

                <tr>  
                     <td width="30%"><label>Description</label></td>  
                     <td width="70%">'.$row["description"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Type</label></td>  
                     <td width="70%">'.$row["type"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Submission Date & Time</label></td>  
                     <td width="70%">'.$row["sdate"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Advisor Comment</label></td>  
                     <td width="70%">'.$row["adreason"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>HOD Comment</label></td>  
                     <td width="70%">'.$row["hodreason"].'</td>  
                </tr>
                ';

        }
        if ($row['type']=='Closed Divion') {
          $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row['name'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Academic Number</label></td>  
                     <td width="70%">'.$row['acnumber'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Specialization</label></td>  
                     <td width="70%">'.$row['specialization'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Phone Number</label></td>  
                     <td width="70%">'.$row['phnumber'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Course Number</label></td>  
                     <td width="70%">'.$row['coursenumber'].'</td>  
                </tr>  

                <tr>  
                     <td width="30%"><label>Course Name</label></td>  
                     <td width="70%">'.$row["coursename"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Course Division Number</label></td>  
                     <td width="70%">'.$row["coursednumber"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Type</label></td>  
                     <td width="70%">'.$row["type"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Submission Date & Time</label></td>  
                     <td width="70%">'.$row["sdate"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Advisor Comment</label></td>  
                     <td width="70%">'.$row["adreason"].'</td>  
                </tr>
                 <tr>  
                     <td width="30%"><label>HOD Comment</label></td>  
                     <td width="70%">'.$row["hodreason"].'</td>  
                </tr>
                
                ';

        }
        if ($row['type']=='Overload') {
          $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row['name'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Academic Number</label></td>  
                     <td width="70%">'.$row['acnumber'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Specialization</label></td>  
                     <td width="70%">'.$row['specialization'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Phone Number</label></td>  
                     <td width="70%">'.$row['phnumber'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Requested Study-Hours</label></td>  
                     <td width="70%">'.$row['reqhours'].'</td>  
                </tr>  

                <tr>  
                     <td width="30%"><label>Current GPA</label></td>  
                     <td width="70%">'.$row["gpa"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Expected Graduation Year</label></td>  
                     <td width="70%">'.$row["expecY"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Reason</label></td>  
                     <td width="70%">'.$row["description"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Type</label></td>  
                     <td width="70%">'.$row["type"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Submission Date & Time</label></td>  
                     <td width="70%">'.$row["sdate"].'</td>  
                </tr>
                
                <tr>  
                     <td width="30%"><label>Advisor Comment</label></td>  
                     <td width="70%">'.$row["adreason"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>HOD Comment</label></td>  
                     <td width="70%">'.$row["hodreason"].'</td>  
                </tr>
        
                ';

        }
          
           
      }  
      $output .= "</table></div>";  
      echo $output;
	?>
</div>
</body>
<div class="footer" style="text-align: center;">
	<img src="img/Footer.png" width="960">
</div>
</html>
<script type="text/javascript">
window.print();
</script>