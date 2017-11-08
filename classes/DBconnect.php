<?php 
	class DBconnect extends page 
	{
		public function get()
		{
			$servername = "sql.njit.edu";
			$username = "ma678";
			$password = "vbBE9fgQM";
			$dbname = "ma678";

		    $fieldset = "";
		    $table = "";

			try 
			{
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $fieldset .= htmlTags::h2("Connected cuccessfully");
			    $sql = $conn->prepare("SELECT * FROM accounts WHERE id < 6");
			    $sql->execute();

			    //count and add the number of records to page
			    $rowCount = $sql->rowCount();
			    $fieldset .= htmlTags::h3("Number of Records: $rowCount"); 

			    // set the resulting array to associative array
			    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
			    $result = $sql->fetchAll();
			    
			    $table .= htmlTags::tableOpen();
			    $table .= htmlTags::theadOpen();
			    $table .= htmlTags::trOpen();
			    $table .= htmlTags::th("ID");
		    	$table .= htmlTags::th("E-mail");
		    	$table .= htmlTags::th("First Name");
		    	$table .= htmlTags::th("Last Name");
		    	$table .= htmlTags::th("Phone");
		    	$table .= htmlTags::th("Birthday");
		    	$table .= htmlTags::th("Gender");
		    	$table .= htmlTags::th("Password");
		    	$table .= htmlTags::trClose();
		    	$table .= htmlTags::theadClose();
		    	$table .= htmlTags::tbodyOpen();

			    foreach ($result as $row)
			    {
			    	$table .= htmlTags::trOpen();
			    	$table .= htmlTags::td($row['id']);
			    	$table .= htmlTags::td($row['email']);
			    	$table .= htmlTags::td($row['fname']);
			    	$table .= htmlTags::td($row['lname']);
			    	$table .= htmlTags::td($row['phone']);
			    	$table .= htmlTags::td($row['birthday']);
			    	$table .= htmlTags::td($row['gender']);
			    	$table .= htmlTags::td($row['password']);	
			    	$table .= htmlTags::trClose();	
			    }
			    $table .= htmlTags::tbodyClose();
			}
			catch(PDOException $e) {
			    $fieldset .= htmlTags::h2("Error: " . $e->getMessage());
			}
			$conn = null;
			$table .= htmlTags::tableClose();

			//Organize and add elements to page-build
			$this->html .= htmlTags::fieldset($fieldset, htmlTags::h2("Database Information"));
			$this->html .= $table;
		} 
	}
?>