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
				<form method="post" id="news_paper">
					<tr><td colspan="2"> <font face="Courier new" size="4" color="Darkred"> <b><a href="home.html">Home</a> > News Paper</b> <hr color="darkred"/></font></td></tr>
					<tr>
						<td align="left" width="45%">Date:</td><td align="left"> <input type="date" name="dated" value="this.today();" /></td>
					</tr>
					<tr>
						<td align="left">News paper Name:</td>
						<td align="left">
							<select name="paper_name" form="news_paper">
								<option value="Hindustan Times">Hindustan Times</option>
								<option value="Times Of India">Times Of India</option>
								<option value="The Hindu">The Hindu</option>
								<option value="Indian Express">Indian Express</option>
								<option value="Dainik Bhaskar">Dainik Bhaskar</option>
								<option value="Dainik Jagran">Dainik Jagran</option>
								<option value="Other">Other</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="left">Quantity:</td><td align="left"> <input type="text" name="paper_quantity" value="1" /></td>
					</tr>
					<tr>
						<td align="left">News paper Price(Rate):</td><td align="left"> <input type="text" name="paper_price" value="4" /></td>
					</tr>
					<tr>
						<td align="left">Remark:</td><td align="left"> <textarea rows="4" cols="50" name="remark">Some info...</textarea> </td>
					</tr>
					<tr><td colspan="2" align="right"> <hr color="darkred"/> <input type="submit" value="Save" /> </td></tr>
				</form>
				</table>
			</div>
			<br/>
			<!--Php code place here.-->
			<center>
				<!-- Checking for provided input. (also query result will be show here.)-->
				<div id="result_output">
				<font face="Calibri" size="3" color="yellow">
				<?php
					$categary="news";
					$dated = $_POST['dated'];
					$col1=$_POST['paper_name'];
					$col2=$_POST['paper_quantity'];
					$amount=$_POST['paper_price'];
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
