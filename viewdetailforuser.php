<?php
require_once('connect.php');
session_start();
$serviceId = $_GET['serviceId'];
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
        <a href="staffsignin.php">Log in</a>
        <a href="staffregister.php">Sign up</a>
        <a href="management.php">Home</a>
      </div>
    </div>
    <div class="motto">
      <h1>A Smooth Laundry Service by Washing Bapu:)</h1>
    </div>
  </div>
  <body>
    <div class="row">
    <div class="content">

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
                      <th>Member Id</th>
                      <th>Member Name</th>
                      <th>Item Name</th>
                      <th>Quantity</th>


                  </tr>
  		 <?php
  				 	$q="SELECT *,firstName,lastName,itemName FROM `regisitem`,`member`,`item` where  `serviceId` = '$serviceId' AND regisitem.memberId = member.memberId AND regisitem.itemId = item.itemId ORDER BY `serviceId`";
  					$result=$mysqli->query($q);
  					if(!$result){
  						echo "Select failed. Error: ".$mysqli->error ;
  						// break;
  					}
  				 while($row=$result->fetch_array()){ ?>

                   <tr>


                      <td><?=$row[3]?></td>
                      <td><?=$row[2]?></td>
                      <td><?=$row[1]?></td>
                      <td><?=$row[7]?> <?=$row[8]?></td>
                      <td><?=$row[18]?></td>
                      <td><?=$row[5]?></td>

                  </tr>
  				<?php } ?>


              </table>
              <br>
              <a href="trackservice.php">
                <h2 style="text-align:center">Go back</h2>
              </a>
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
