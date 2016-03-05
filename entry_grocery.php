<html>
<head>
	<title>Daily PROVISION</title>
	<link rel="stylesheet" href="form_layout.css" type="text/css">
</head>
	<body><center>
			<div id="header"> <font face="Courier new" size="7" color="lightcyan">DAILY PROVISION</font><font face="Courier new" size="1" color="lightcyan">Record your daily provisions in easy way.</font> <br/> </div>
			<br/><br/><br/><br/><br/>
			<div id="page">
				<div id="line"></div>
				<table width="70%">
				<form method="post">
					<tr><td colspan="2"> <font face="Courier new" size="4" color="Darkred"> <b><a href="home.html">Home</a> > Grocery</b> <hr color="darkred"/></font></td></tr>
					<tr>
						<td align="left">Date:</td><td align="left"> <input type="date" name="dated" value="this.today();" /></td>
					</tr>
					<tr>
						<td align="left">Shop Name:</td><td align="left"> <input type="text" name="shop_name" value="BIT CC" /></td>
					</tr>
					<tr>
						<td align="left">Product:</td><td align="left"> <input type="text" name="grocery_quantity" value="" /></td>
					</tr>
					<tr>
						<td align="left">Total amount:</td><td align="left"> <input type="text" name="grocery_total" value="" /></td>
					</tr>
					<tr>
						<td align="left">Remark:</td><td align="left"> <textarea rows="4" cols="50" name="remark">Paid</textarea> </td>
					</tr>
					<tr><td colspan="2" align="right"> <hr color="darkred"/> <br/> <input type="submit" value="Save" /> </td></tr>
				</form>
				</table>
			</div>
			<br/>

			<center>
				<!-- Checking for provided input. (also query result will be show here.)-->
				<div id="result_output">
				<font face="Calibri" size="3" color="yellow">
				<?php
					$categary="grocery";
					$dated = $_POST['dated'];
					$col1=$_POST['shop_name'];
					$col2=$_POST['grocery_quantity'];
					$amount=$_POST['grocery_total'];
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
