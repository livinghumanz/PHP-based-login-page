
<?php
// this php script is for connecting with database
// data have to fetched from local server
$mysql_host = 'localhost';

// user name is root
$mysql_user = 'root';

// function to connect with database having
$conn = mysql_connect ($mysql_host, $mysql_user);
// argument host and user name
if (! $conn)
{
    die('Cannot connect to database');
}
else
{
    // database name is livinhu_db
    if (@mysql_select_db('livinhu_db'))
    {
        echo "<p style=color:green>Connection Success</p> <br>";//if connection suceeds
    }
    else
    {
        die('Cannot connect to database');//else part
    }
}
//---------Getting information from html and storing in databse----------------------------------------------------
$name = $_POST["Name"];
$p1 = $_POST["passwd1"];
$p2 = $_POST["passwd2"];
$pno = $_POST["pno"];
//---------------------------------------------------validat phone number-------------------------------------------------
if ($name==null)
{echo "Name not entered";
  //header("Location: file:///home/humanz/Desktop/sakthi/passwd.html");
  goto end;
}
if ($pno!=null)
{
  //checkrepeat($name,$conn);
  if(@checkrepeat($pno,$conn)!=0)
  {
    echo "the user contact already exists ";
    goto end;
  }
}
// -------------------validating password-------------------------------------------------------
if ($p1 != $p2)
{
  echo "<p style=color:red>"." password dosent match error:&#10007</p>";
  goto end;
}
elseif ($p1==null) {
  echo "<p style=color:red> password is null &#9760</p>";
  if($p2==null){echo "<p style=color:red> re-password is null &#9760</p>";}
  goto end;
  }
  elseif ($p1==$p2) {
    echo "<p style=color:green>Password match sucess \n new user will be created &#9787 &#10004</p>";
    updatedb($pno,$name,$p1,$conn);
    //goto end;
  }

                  //-----------------------------------------------functions--------------------
                            function updatedb($pno,$name,$p1,$conn)
                            {
                              $qry1 = "insert into detail (contact,name,passwd) values('$pno','$name','$p1')";
                              $retrival1 = mysql_query($qry1,$conn);
                              if(!$retrival1){die('update database not done'. mysql_error());}
                              else { echo "update database done";             }
                            }


                            function checkrepeat($pno,$conn)
                            {
                              $count = 0;
                              $query = "select * from detail";//querry to select data from table
                              $retrival = mysql_query($query,$conn);//executing the querry and getting the data
                              if(! $retrival){ die('couldnot get data' . mysql_error());}
                              $rows = mysql_fetch_array($retrival,MYSQL_NUM);//storing the data in the form of array in $rows
                              //echo "<br>row count is " . count($rows)."<br>";//counting the total element in the $row array
                              $i = 0;
                              //echo "<table><tr><td> Name</td><td>Password</td> </tr>";//creating a table
                              // Acessing the array index using loop and displaying the element inside the table
                              while ($i < count($rows)) {
                                if($i%3 == 0){
                                  if($pno==$rows[$i]){
                                    //  echo "user name already present please change ";
                                    $count = $count + 1;
                                  }
                                }
                                //elseif ($i/2 != 0) {echo "<td>" . $rows[$i] . "</td></tr>";  }

                                $i++;
                              }
                              return($count);
                            }


                                      //---------------------------Querry to display all the values in the table---------------------------------------
                                      /*

                                      $query = "select * from detail";//querry to select data from table
                                      $retrival = mysql_query($query,$conn);//executing the querry and getting the data
                                      if(! $retrival){ die('couldnot get data' . mysql_error());}
                                      $rows = mysql_fetch_array($retrival,MYSQL_NUM);//storing the data in the form of array in $rows
                                      echo "<br>row count is " . count($rows)."<br>";//counting the total element in the $row array
                                      $i = 0;
                                      echo "<table><tr><td> Name</td><td>Password</td> </tr>";//creating a table
                                      // Acessing the array index using loop and displaying the element inside the table
                                      while ($i < count($rows)) {
                                      if($i/2 == 0){echo "<tr><td>" . $rows[$i] ."</td>";}
                                      elseif ($i/2 != 0) {echo "<td>" . $rows[$i] . "</td></tr>";  }

                                      $i++;
                                    }
                                    //end of loop and closing the table tag
                                    echo "</table>fetched data sucessfully";

                                    */
end:
mysql_close($conn);//closing the connection
?>
