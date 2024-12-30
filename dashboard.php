<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");
}
$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];
if($_SESSION['userdata']['status']==0){
    $status ='<b style="color:red">Not Voted</b>';
}
else{
    $status = '<b style="color:green">Voted</b>';
}
?>

<html>
<head>
    <title>Online Voting System-Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
    <style>
        #back{
            padding:10px;
            border-radius: 5px;
            background-color:#40eb34;
            color:white;
            font-weight:bold;
            float:left;
        }
        #log{
            padding:10px;
            border-radius: 5px;
            background-color:#40eb34;
            color:white;
            font-weight:bold;
            float:right;
        }
       #profile{
        position:absolute;
        left:10px;
        top:130px;
        border: 2px solid white;
        width: 300px;
        background-color: white;
        
       }
       #group{
        position:absolute;
        right:50px;
        top:130px;
        border: 2px solid white;
        width: 600px;
        background-color: white;
       }
       
       #votebtn{
            padding:10px;
            border-radius: 5px;
            background-color:#40eb34;
            color:white;
            font-weight:bold;
       }
    </style>
    <div id="mainsection">
    <div id="headersection">
    <a href="../"><button id="back">Back</button></a>
    <a href="logout.php"><button id="log">Logout</button></a>
    <h1>Online Voting System</h1>
    </div>
    <hr>
    <div id="Profile">
        <img src="../uploads/<?php echo $userdata['Photo']; ?>"  height="100" width="100"  alt="User Profile Image" ></br></br>
        <b>Name</b>: <?php echo $userdata['name']?></br></br>
         <b>Mobile</b>: <?php echo $userdata['Mobile']?></br></br>
         <b>Address</b>: <?php echo $userdata['Address']?></br></br>
        <b>statue</b>: <?php echo $status?></br></br>
    </div>
    <div id="Group">
        <?php 
          if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata); $i++)
                {
                ?>
                <div>
                    <img src="../uploads/<?php echo $groupsdata[$i]['Photo'] ?>" heiht="100" width="100" alt="groups profile Image"></br>
                    
                <b>Group Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br>
                <b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?></br></br>
                <form action="../api/vote.php" method="POST">
                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['Id']?>">
                    <input type="submit" name="votebtn" value="Vote" id="votebtn">
                </form>
                </div>
                <hr>
                <?php 
                }
          }
          else{

          }
        ?>
    </div>
    </div>
</body>
</html>