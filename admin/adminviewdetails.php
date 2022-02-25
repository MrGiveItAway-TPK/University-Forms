<?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "universityforms");  
      $query = "SELECT * FROM forms  WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);
      $lvl= $_POST["id2"];
      if ($lvl=='HOD') {
          $ap="hodapprove.php";
          $ad="hoddeny.php";
      }
      if ($lvl=='Advisor') {
          $ap="adapprove.php";
          $ad="addeny.php";
      }
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
                <tr>  
                     <td width="70%">Actions</td> 
                     <td width="30%">
                     <a href='.$ap.'?id='.$_POST["id"].'>Approve</a> 
                     <a> / </a> 
                     <a href='.$ad.'?id='.$_POST["id"].'>Deny</a>
                     </td>  
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
                <tr>  
                     <td width="70%">Actions</td> 
                     <td width="30%">
                     <a href='.$ap.'?id='.$_POST["id"].'>Approve</a> 
                     <a> / </a> 
                     <a href='.$ad.'?id='.$_POST["id"].'>Deny</a>
                     </td>  
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
                <tr>  
                     <td width="70%">Actions</td> 
                     <td width="30%">
                     <a href='.$ap.'?id='.$_POST["id"].'>Approve</a> 
                     <a> / </a> 
                     <a href='.$ad.'?id='.$_POST["id"].'>Deny</a>
                     </td>  
                </tr>
        
                ';

        }
          
           
      }  
      $output .= "</table></div>";  
      echo $output;
 }  
 ?>