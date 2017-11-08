<?php 
class homepage extends page 
{
	public function get()
	{
		header('refresh: 2; url=index.php?page=DBconnect');
		echo "<center><h1>Welcome!</h1></center>";
	}
    
}
 ?>