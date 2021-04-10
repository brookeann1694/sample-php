<html>

   <head>
      <title>Project Submission Tracker (HTML/PHP/MYSQL)</title>
   </head>

   <body>
      <?php
         if(isset($_POST['add'])) {
            $dbhost = 'db-mysql-mtg-14981-do-user-9057563-0.b.db.ondigitalocean.com:25060';
            $dbuser = 'doadmin';
            $dbpass = 'vmfgowz9s3x40idw';
            $dbname = 'defaultdb';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
 
            $project_title = $_POST['project_title'];
            $project_author = $_POST['project_author'];
            $project_date = $_POST['submission_date'];
            
            mysqli_select_db($conn, $dbname);
            $sql="INSERT INTO project_tbl (project_title, project_author, submission_date)
            VALUES
            ('$_POST[project_title]','$_POST[project_author]','$_POST[submission_date]')";

            if (!mysqli_query($conn,$sql))
            {
             die('Error: ' . mysql_error());
            }
            
            //echo "1 record added";
           
            mysqli_close($conn);       
            
           //header ("Location: index.php");
           //header("Location: https://dream-harvest-php-2-2jfb4.ondigitalocean.app/");
           header("Location: index.php");
            
            exit;
            
         } else {
      ?>
   
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Project Title</td>
               <td>
                  <input name = "prpject_title" type = "text" id = "project_title">
               </td>
            </tr>
         
            <tr>
               <td width = "250">Project Owner</td>
               <td>
                  <input name = "project_owner" type = "text" id = "project_owner">
               </td>
            </tr>
         
            <tr>
               <td width = "250">Submission Date [   yyyy-mm-dd ]</td>
               <td>
                  <input name = "submission_date" type = "text" id = "submission_date">
               </td>
            </tr>
      
            <tr>
               <td width = "250"> </td>
               <td> </td>
            </tr>
         
            <tr>
               <td width = "250"> </td>
               <td>
                  <input name = "add" type = "submit" id = "add"  value = "SUBMIT">
               </td>
            </tr>
         </table>
      </form>
   <?php
      }
   ?>
   </body>
</html>
