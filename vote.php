<?php 
session_start();
 include("connect.php");

 $votes=$_POST['gvotes'];
 $total_votes=$votes+1;
 $gid =$_POST['gid'];
 $uid =$_SESSION['userdata']['Id'];

 $update_votes =mysqli_query($conn, "UPDATE user SET votes='$total_votes' WHERE Id='$gid'");
 $update_user_status =mysqli_query($conn, "UPDATE user SET status=1 WHERE Id='$uid' ");
 
 if($update_votes and $update_user_status){
    $groups=mysqli_query($conn, "SELECT *FROM user WHERE role=2");
    $groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);
    $_SESSION['userdata']['status']=1;
    $_SESSION['groupsdata']=$groupsdata;
    echo'
    <script>
      alert("Voting Successfull!!");
      window.location="../routes/dashboard.php";
    </script>
';
 }
 
    else{
        echo'
             <script>
               alert("Some Error Occured!");
               window.location="../routes/dashboard.php";
             </script>
        ';
     }
 

?>