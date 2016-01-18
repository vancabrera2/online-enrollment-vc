			<form method="post" class="form">
									
					<table>
						<label class="txt-reg"> Search Student </label>
								<tr>
									<td>Enter Student Id</td>
									<td><input type="text" name='searchid' placeholder="Input student id "/></td>
								</tr>
								<tr>
									<td> <input type="submit" name="btnsearchstud" /> </td>
								</tr>
					</table>
		
							
					
	<?php
			if (isset($_POST['btnsearchstud']))
				{	   
					include 'connection.php'; 
					$search =$_POST['searchid'];										
					$search_query = mysql_query("SELECT * FROM student WHERE StudentID  = '$search'");
					
			if ($search_query) 
				{
					 
					 while($output = mysql_fetch_array($search_query)) 
						{
								$id=$output['StudentID'];
								$username=$output['Username'] ;				
								$firstname=$output['Firstname'] ;
								$lastname=$output['Lastname'] ;
								$address=$output['Address'] ;
								$year=$output['Year'] ;
								$gender=$output['Gender'] ;
								$course=$output['Course'] ;		
			?>	
					<div id="table-result">				
					<table border="1" class="table-search">
						<label class="txtsearch"> <font size="5"> <b> Search result: </b> </font>		
			
							<tr>
								<th> Student ID </th>
								<th> Username </th>
								<th> FirstName </th>
								<th> LastName </th>
								<th> Address </th>
								<th> Year </th>
								<th> Gender </th>
								<th> Course </th>
								<th> Subject </th>
								</tr>
			
		
								
								<tr align="center">
								<td> <?php echo $id; ?> </td>
								<td> <?php echo $username; ?> </td>
								<td> <?php echo $firstname; ?> </td>
								<td> <?php echo $lastname; ?> </td>
								<td> <?php echo $address; ?> </td>
								<td> <?php echo $year; ?> </td>
								<td> <?php echo $gender; ?> </td>		
								<td> <?php echo $course; ?> </td>
								<td> Subject </td>
								</tr>
				</table>
					</div> 
	<?php	
					}
		}
		else{
			echo "<h3>No Record found</h3>";
			}
					mysql_close($con);	
			}
				
	?>
					
				</form>
		</div> <!-- end of search-->
		