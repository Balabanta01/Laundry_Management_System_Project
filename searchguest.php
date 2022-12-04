<?php
require_once('connect.php');
$serachId = $_POST['searchServiceId'];

// echo "MID".$memberId;
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Database project</title>
    <link rel="stylesheet" type="text/css" href="stylesbackup1.css">

  </head>
  <div class="header">
    <div class="logoWrapper">
      <img class="logo" src="wash.png" border="0" />
      <div class="topnav">
        <a href="usersignin.php">Log in</a>
        <a href="userregister.php">Sign up</a>
        <a href="usermanagement.php">Home</a>
        <a href="welcome.php">Go back</a>
      </div>
    </div>
    <div class="motto">
      <h1>A Smooth Laundry Service by Washing Bapu:)</h1>
    </div>
  </div>
  <body>
    <div class="row">
    <div class="content">
<!-- if(isset($_SESSION['userStatus']) && (($_SESSION['userStatus']=="STAFF") || ($_SESSION['userStatus']=="ADMIN"))){ -->
    
    <div class="boxWrapper">


      <div class="">
        <table>
                <col width="5%">
                <col width="5%">
                <col width="5%">
                <col width="20%">
                <col width="15%">
                <col width="5%">
                <col width="10%">
                <col width="10%">
                <col width="5%">


                <tr>
                    <th>Service ID</th>
                    <th>Staff ID</th>
                    <th>Member ID</th>
                    <th>Date In</th>
                    <th>Date Out</th>
                    <th>Service status</th>
                    <th>Total price</th>
                    <th>View Details</th>

                </tr>
     <?php
          $q="SELECT * FROM `laundryservice` where  `serviceId` = '$serachId' ORDER BY `serviceId`";
          $result=$mysqli->query($q);
          if(!$result){
            echo "Select failed. Error: ".$mysqli->error ;
            // break;
          }
         while($row=$result->fetch_array()){ ?>
           <?php
            $dashDateOut="";
            if ($row['dateOut']=="0000-00-00") {
              $dashDateOut="-";
            }
            else {
              $dashDateOut=$row['dateOut'];
            }
            $finishStatus="";
            if($row['serviceStatus']=="NF"){
              $finishStatus="Not finish";
            }
            else {
              $finishStatus="Finished";
            }
            ?>
                 <tr>
                    <td><?=$row['serviceId']?></td>
                    <td><?=$row['staffId']?></td>
                    <td><?=$row['memberId']?></td>
                    <td><?=$row['dateIn']?></td>
                    <td><?=$dashDateOut?></td>
                    <td><?=$finishStatus?></td>
                    <td><?=$row['totalPrice']?></td>
                    <td><a href='viewdetailforuser.php?serviceId=<?=$row['serviceId']?>'> <img src="viewdetail.png" width="24" height="24"></a></td>
                </tr>
        <?php } ?>


            </table>
      </div>





    </div>


    </div>
  </div>

  <footer>
  <div class="footerContent">
      <div class="logoWrapper">
        <img class="logo" src="wash.png" border="0" />
      </div>
      <div class="leftFooter">
        <h1 id="followUs">Follow us . . </h1>
        <div class="iconWrapper">
          <a href="https://github.com/Balabanta01/">
            <img class="socialIcon" src="github.png" border="0" />
          </a>
          <a href="https://www.instagram.com/balabantasahoo">
            <img class="socialIcon" src="ig.png" border="0" />
          </a>
          <a href="https://twitter.com/Balabanta01">
            <img class="socialIcon" src="twitter.png" border="0" />
          </a>
        </div>
      </div>
      <div class="rightFooter">
        <div class="memberCredit">
          <h1>Created by-<br><h3>Balabanta Sahoo</h3></h1>
        </div>
        

        </div>
      </div>
    </div>
  </footer>
  </body>

</html>
