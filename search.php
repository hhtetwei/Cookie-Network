<?php 
include('db.php');
if(isset($_POST['name']))
{
	$name=$_POST['name'];
	$user_sql=mysqli_query($conn,"SELECT * FROM user WHERE name LIKE '%$name%'");
	$data="";
	$data.='<ul class="list-group mt-2 people">';
	while($users=mysqli_fetch_assoc($user_sql))
	{
		$data.='<li class="list-group-item py-1 bg-light">
            <a href="" class="card-link text-dark">
            <b class="mr-2">'.$users['name'].'</b>
            <small> Live in: '.$users['address'].'</small>
            <img src="img/'.$users['photo'].'" class="rounded-circle float-right" width="50px" height="50px">
            </a>
          </li>';
	}

	$data.=' </ul>
       <br>
      <div class="bg-light posts">';

    $post_sql=mysqli_query($conn,"SELECT post.*,user.name,user.photo FROM post INNER JOIN user ON post.user_id=user.id WHERE post.title LIKE '%$name%' OR post.description LIKE '%$name%'");
    while($posts=mysqli_fetch_assoc($post_sql))
    {
    	$data.='<div class="media border">
        <a href="" class="card-link text-dark">
        <div class="media-left">
          <img src="img/'.$posts['post_photo'].'" class="media-object my-2 ml-2" width="120px">
        </div>
        <div class="media-body ml-2">
         <h6 class="media-heading mt-3">'.$posts['title'].'</h6>
          <small>'.$posts['description'].'</small></a><br>

          <a href="" class="text-dark"><small>Posted by : <b>'.$posts['name'].'</b></small>
          <img src="img/'.$posts['photo'].'" class="rounded-circle float-right mr-2 mb-1" width="30px">
          </a>
        </div>
        </div>';
    }
    $data.='</div>';
    echo $data;

}
?>