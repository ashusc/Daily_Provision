<html>
	<link rel="stylesheet" href="form_layout.css" type="text/css">
	<body><center>
			<div id="header"> <font face="Courier new" size="7" color="lightcyan">DAILY PROVISION</font><font face="Courier new" size="1" color="lightcyan">Record your daily provisions in easy way.</font> <br/> </div>
			<br/><br/><br/><br/><br/>
			<div id="view_page">
				<div id="line"></div>
				<table width="95%" border="0">
				
					<tr><td colspan="11"> <font face="Courier new" size="4" color="Darkred"> <b><a href="home.html">Home</a> > Current Records</b> <hr color="darkred"/></font></td></tr>
					<tr bgcolor="gray">
						<td class="showed_data_header" align="left" width="9%">Date \ Category</td>
						<td class="showed_data_header" align="left" width="9%">Milk</td>
						<td class="showed_data_header" align="left" width="9%">Grocery</td>
						<td class="showed_data_header" align="left" width="9%">Mobile</td>
						<td class="showed_data_header" align="left" width="9%">Laundry</td>
						<td class="showed_data_header" align="left" width="9%">NewsPaper</td>
						<td class="showed_data_header" align="left" width="9%">Education</td>
						<td class="showed_data_header" align="left" width="9%">Transport</td>
						<td class="showed_data_header" align="left" width="9%">Canteen</td>
						<td class="showed_data_header" align="left" width="9%">Water</td>
						<td class="showed_data_header" align="left" width="9%">Extra</td>
					</tr>
					<tr class="data">
						<?php
							mysql_connect("localhost","root","root") or die("<font color='darkred'>Sorry, But Could Not Connect to database currently !!! Make sure server is on and database Exist.<br/></font>");
							$db_name=mysql_select_db("daily_p");
					
							//$query="insert into records values('".$categary."','".$dated."','".$col1."','".$col2."','".$amount."','".$remark."')";
							$query="select * from records order by dated";
							//doing
							$my_query=mysql_query($query);
						?>
					</tr>
					<tr><td colspan="11" align="right"> <hr color="darkred"/> <br/></td></tr>
				
				</table>
			</div>
			<br/>
			
			<center>
				<!-- Checking for provided input. (also query result will be show here.)-->
				<div id="result_output">
				<font face="Calibri" size="3" color="yellow">
				<?php
					$categary="water";
					$dated = $_POST['dated'];
					$col1=$_POST['shop_name'];
					$col2=$_POST['water_quantity'];
					$amount=$_POST['water_amount'];
					$remark = $_POST['remark'];
					
					mysql_connect("localhost","root","root") or die("<font color='darkred'>Sorry, But Could Not Connect to database currently !!! Make sure server is on and database Exist.<br/></font>");
					$db_name=mysql_select_db("daily_p");
					
					$query="insert into records values('".$categary."','".$dated."','".$col1."','".$col2."','".$amount."','".$remark."')";
					
					//doing
					$my_query=mysql_query($query);
					
					if($dated==null && $$shop_name==null && $milk_quantity==null && $milk_price==null && $remark==null){
						//result to print
						echo "Status : Fill the Fields.";
					}
					else if($dated=="dd-mm-yyyy" or $dated=="yyyy-mm-dd"){
						echo "Status : Fill the Date Field.";
					}
					else{
						if($my_query==1){
							echo "<script type='text/javascript'>alert('Status : Data successfully inserted.')</script>";
						}else{
							echo "<script type='text/javascript'>alert('Status : Something happened wrong[check date field].')</script>";
						}
					}
				?>
				</font>
				</div>			
				<!-- Output ends.-->
	</body>
</html>