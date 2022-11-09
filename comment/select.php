<?php 
session_start();
include('../db.php');
$sql=mysqli_query($conn,"SELECT comment.*,user.name,user.photo FROM comment INNER JOIN user ON comment.user_id=user.id WHERE comment.post_id='".$_SESSION['pid']."'");
while($comment=mysqli_fetch_assoc($sql)){
?>
	<div class="media mb-2">
		<div class="media-left">
			 <img src="img/<?php echo $comment['photo']; ?>" class="media-object rounded-circle m-2" width="35px" height="35px">
		</div>
		<div class="media-body">
			<b><?php echo $comment['name']; ?></b><br>
			    <i><?php echo $comment['comment']; ?></i>
		</div>
	</div>

<?php } ?>