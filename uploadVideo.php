<?php
if(isset($_FILES['file'])){
			
				$name = $_FILES['file']['name'];
				$extension = explode('.', $name);
				$extension = end($extension);
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size'] /1024/1024;
				$random_name = rand();
				$tmp = $_FILES['file']['tmp_name'];
				
				
				if ((strtolower($type) != "video/mp4") && (strtolower($type) != "video/mpeg") && (strtolower($type) != "video/mpeg1") && (strtolower($type) != "video/mpeg4") && (strtolower($type) != "video/avi") && (strtolower($type) != "video/flv") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/mov"))
				{
					$message= "Video Format is not supported !";
					
    			}elseif($size >= 20971520)
				{
					$message="File must not greater than 20mb";
				}else
				{
					move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$extension);	
					mysqli_query($con, "INSERT INTO vid_entry VALUES('', '$name' , '$random_name.$extension')");
					$message="Video has been successfully uploaded !";
				}
				echo "$message <br/> <br/>";
				echo "size: $size mb<br/>";
				echo "random_name: $random_name <br/>";
				echo "name: $name <br/>";
				echo "type: $type <br/><br/>";
}