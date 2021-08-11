<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=gamingblog', 'root', '');
// select all original comments
$query = "
SELECT * FROM tbl_comment 
WHERE parent_comment_id = '0' 
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();
$result = $statement->fetchAll();
$output = '';
// for each original comment in $result put it in $row then apply below code to each $row
foreach($result as $row)
{
    // ".=" =>prevents $output from deleting what it had everytime it moves on to the next row
    //we're looping through each comment and putting its info in the html to set it up how we want it to look like in the comment section
 $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
  <div class="panel-body">'.$row["comment"].'</div>
  <div class="panel-footer" align="right"><button type="button" class="btn btn-light reply" id="'.$row["comment_id"].'">Reply</button></div>
 </div>
 ';
 //for each comment ($row) we get its replies with the function get_reply_comment()
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;
// RECURSIVE FUNCTION
// parent_id is the id of the comment we want to get the replies of
function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
    //fetch all the replies of parent comment id( whatever replies have as a parent_comment_id the parent_id)
 $query = "
 SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."'
 ";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
// statement has all the replies
// we're counting how many replies we got

 $count = $statement->rowCount();
// we check if the parent_id is an original comment
 if($parent_id == 0)
 {
    //  set its margin left
  $marginleft = 0;
 }
//  if its a reply we set its margin to:
 else
 {
    //  we give it as a margin its previous value +48
  $marginleft = $marginleft + 48;
 }
//  checking if we have minimum 1 reply
 if($count > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
    <div class="panel-body">'.$row["comment"].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-light reply" id="'.$row["comment_id"].'">Reply</button></div>
   </div>
   ';
   
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
//  if count<0 the return is meant to break the recursivness since  $output = '';

return $output;
}
?>