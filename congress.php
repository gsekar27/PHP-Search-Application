
<?php

//Array for state drop down
$db_array = array("legislators"=>"State/Representative*", "committees"=>"Committee ID*", "bills"=>"Bill ID*", "amendments"=>"Amendment ID*");

$state_array["alabama"]="AL";
$state_array["alaska"]="AK";
$state_array["arizona"]="AZ";
$state_array["arkansas"]="AR";
$state_array["california"]="CA";
$state_array["colorado"]="CO";
$state_array["connecticut"]="CT";
$state_array["delaware"]="DE";
$state_array["district of columbia"]="DC";

$state_array["montana"]="MT";
$state_array["nebraska"]="NE";
$state_array["nevada"]="NV";
$state_array["new hampshire"]="NH";
$state_array["new jersey"]="NJ";
$state_array["new mexico"]="NM";
$state_array["new york"]="NY";
$state_array["north carolina"]="NC";
$state_array["north dakota"]="ND";

$state_array["florida"]="FL";
$state_array["georgia"]="GA";
$state_array["hawaii"]="HI";
$state_array["idaho"]="ID";
$state_array["illinois"]="IL";
$state_array["indiana"]="IN";
$state_array["iowa"]="IA";
$state_array["kansas"]="KS";
$state_array["kentucky"]="KY";

$state_array["louisiana"]="LA";
$state_array["maine"]="ME";
$state_array["maryland"]="MD";
$state_array["massachusetts"]="MA";
$state_array["michigan"]="MI";
$state_array["minnesota"]="MN";
$state_array["mississippi"]="MS";
$state_array["missouri"]="MO";
$state_array["ohio"]="OH";

$state_array["oklahoma"]="OK";
$state_array["oregon"]="OR";
$state_array["pennsylvania"]="PA";
$state_array["rhode island"]="RI";
$state_array["south carolina"]="SC";
$state_array["south dakota"]="SD";
$state_array["tennessee"]="TN";
$state_array["texas"]="TX";

$state_array["utah"]="UT";
$state_array["vermont"]="VT";
$state_array["virginia"]="VA";
$state_array["washington"]="WA";
$state_array["west virginia"]="WV";
$state_array["wisconsin"]="WI";
$state_array["wyoming"]="WY";
?>
<!DOCTYPE HTML>
<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">

	#main{
		margin:auto;
		display: block;
		padding:20px;
		height: 250px;
		width: 500px;
		text-align: center;
	}

	#mainForm{
		margin:auto;
		display: block;
		padding-top:5px;
		padding-bottom:5px;
		height: 120px;
		width:350px;
		border-style: solid;
		border-width: 1px;
		font-size: 16;
		display: block;

	}
}
</style>
</head>
<body>
	<div id = "main">
		<h1>Congress Information Search</h1>
		<!-- Main form -->
		<div id = "mainForm" style="clear:both;">
			<form  onsubmit = "return validateForm(document.searchForm,false);" method="post" action = "" name= "searchForm">
				<span style="margin-left: 10px;float: left;">Congress Database</span>
				<select name="db"  onchange="setKeyword(this.options[this.selectedIndex].value);" style="height:15px; width:150px;margin-left:10px">
					<option value="default" disabled
					<?php
					if(!isset($_POST["db"]) && !isset($_GET["db"])){
						echo "selected";
					}
					else{
						echo "";
					}
					?>

					>Select your option</option>

					<option value="legislators"
					<?php
					if(isset($_POST["db"]) && $_POST["db"] == "legislators"){
						echo "selected";
					}
					elseif(isset($_POST["db"]) && $_POST["db"] != "legislators"){
						echo "";
					}
					elseif(isset($_GET["db"]) && $_GET["db"] == "legislators"){
						echo "selected";
					}

					?>
					>Legislators</option>

					<option value="committees"
					<?php


					if(isset($_POST["db"]) && $_POST["db"] == "committees"){
						echo "selected";
					}
					elseif(isset($_POST["db"]) && $_POST["db"] != "committees"){
						echo "";
					}


					?>
					>Committees</option>

					<option value="bills"

					<?php

					if(isset($_POST["db"]) && $_POST["db"] == "bills"){
						echo "selected";
					}
					elseif(isset($_POST["db"]) && $_POST["db"] != "bills"){
						echo "";
					}
					elseif(isset($_GET["db"]) && $_GET["db"] == "bills"){
						echo "selected";
					}
					?>

					>Bills</option>


					<option value="amendments"
					<?php

					if(isset($_POST["db"]) && $_POST["db"] == "amendments"){
						echo "selected";
					}
					elseif(isset($_POST["db"]) && $_POST["db"] != "amendments"){
						echo "";
					}


					?>

					>Amendments</option>
				</select>
				<br />

				Chamber
				<input type="radio" name="chamber"
				<?php

				if(isset($_POST["chamber"]) && $_POST["chamber"] == "senate"){
					echo "checked='true'";
				}
				elseif(isset($_POST["chamber"]) && $_POST["chamber"] == "house")	{
					echo "";
				}
				elseif(isset($_GET["chamber"]) && $_GET["chamber"] == "senate"){
					echo "checked='true'";
				}
				elseif(!isset($_POST["chamber"]) && !isset($_GET["chamber"])){
					echo "checked='true'";
				}


				?>

				value= "senate" style="margin-left:60px; margin-top:7px;">Senate</input>


				<input type="radio" name="chamber"
				<?php

				if(isset($_POST["chamber"]) && $_POST["chamber"] == "house"){
					echo "checked='true'";
				}
				elseif(isset($_POST["chamber"]) && $_POST["chamber"] == "senate")	{
					echo "";
				}
				elseif(isset($_GET["chamber"]) && $_GET["chamber"] == "house"){
					echo "checked='true'";
				}

				?>

				value= "house" style="margin-top:7px;">House</input>


				<br />
				<label for="keyword" id="keywd" style="display:inline;width:140px;margin-left:10px;float:left;margin-top:3px;">
					<?php
					//echo $_SESSION['keyword_label'];
					if(isset($_POST["db"])){
						$db_lbl= $_POST['db'];
						echo "$db_array[$db_lbl]";

					}
					elseif (isset($_GET["db"])) {
						$db_lbl= $_GET['db'];
						echo "$db_array[$db_lbl]";

					}
					else{
						echo "Keyword*";
					}
					?>
				</label>
				<input type="text"
				<?php

				if(isset($_POST["db"])){
					$str_k = $_POST['text_keyword'];

					echo "value = '$str_k'";

				}
				elseif (isset($_GET["db"])) {
					$str_k = $_GET['text_keyword'];

					echo "value='$str_k'";

				}
				else{
					echo "value=''";
				}
				?>

				name = "text_keyword" style="height:15px;width:140px;margin-right:30px;float:right;margin-top:3px;">
				<br>


				<input type="submit" name="submit" value = "Search" onclick="validateForm(document.searchForm,true);" style="margin-left:160px;margin-top:10px;"></input>
				<input type="button" name="clear" value = "clear" onclick="clearForm();" style="margin-right:50px;margin-bottom:8px;"></input>
				<br />


				<a class ="formEle" href= "https://www.sunlightFoundation.com" target="_blank">Powered by Sunlight Foundation</a>

			</form>
		</div>
	</div>
	<!-- Main form -->


	<!-- Output-->
	<div id= "result" style="text-align:center; height:auto">

		<pre>
			<?php

			if(isset($_POST["submit"]))
			{

				$api_key = "eb6c342bbcc448fb96a33f3a8dca3b98";
				$str_http_request = "http://congress.api.sunlightFoundation.com/";
				$str_db =$_POST["db"];
				$str_keyword_leg_o =$_POST["text_keyword"];


				If($str_db == "legislators")
				{

					$str_chamber_leg =$_POST["chamber"];
					$k = strtolower(trim($_POST["text_keyword"]));


					$valid_query = true;

					//to be matched from the associative array
					$str_keyword_leg = array_key_exists($k, $state_array)?$state_array[$k]:"";

					if($str_keyword_leg != ""){
						$str_http_request = $str_http_request.$str_db."?chamber=".$str_chamber_leg."&state=".$str_keyword_leg."&apikey=".$api_key;
					}
					else{
						$k = trim($_POST["text_keyword"]);

						$Str_nameSearch = explode(" ", $k);

						if(count($Str_nameSearch) == 1){//partial name
							$pName = strtolower(trim($Str_nameSearch[0]));
							$str_http_request = $str_http_request.$str_db."?chamber=".$str_chamber_leg."&query=".$pName."&apikey=".$api_key;
						}

						elseif(count($Str_nameSearch) == 2){
							$fName = ucfirst(trim($Str_nameSearch[0]));
							$lName = ucfirst(trim($Str_nameSearch[1]));
							$str_http_request = $str_http_request.$str_db."?chamber=".$str_chamber_leg."&first_name={$fName}&last_name={$lName}&apikey=".$api_key;
						}

						$valid_query = (count($Str_nameSearch) > 2)? false: true;

					}

					if($valid_query == false){
						$row_count =0;
					}
					else {
						$str_json = file_get_contents($str_http_request);
						$parsed_data = json_decode($str_json,true);
						$row_count = (int)count($parsed_data['results']);

					}

					if($row_count > 0 && $valid_query == true)
					{
						echo "<table border='1' width = '80%' style='margin:auto;border-style:solid;border-collapse: collapse;' id = 'table1'>";
						echo "<tr><th width='30%'>Name</th><th width='20%'>State</th><th width='15%'>Chamber</th><th width='15%'>Details</th></tr>";

						for($x = 0; $x < $row_count; $x++){

							$firstName_leg = array_key_exists('first_name',$parsed_data['results'][$x])?$parsed_data['results'][$x]['first_name']:"";
							$lastName_leg= array_key_exists('last_name',$parsed_data['results'][$x])?$parsed_data['results'][$x]['last_name']:"";

							$data_name = $firstName_leg. " " .$lastName_leg;


							$data_state = array_key_exists('state_name',$parsed_data['results'][$x])?$parsed_data['results'][$x]['state_name']:"NA";
							$data_chamber = array_key_exists('chamber',$parsed_data['results'][$x])?$parsed_data['results'][$x]['chamber']:"NA";
							$data_bioguide_id = array_key_exists('bioguide_id',$parsed_data['results'][$x])?$parsed_data['results'][$x]['bioguide_id']:"NA";


							$Details  = "db=legislators&chamber={$data_chamber}&bioguide_id={$data_bioguide_id}&text_keyword={$str_keyword_leg_o}";
							$url_view_details = "congress.php/?" . $Details;

							echo "<tr>";
							echo "<td style='text-align:left;padding-left:20px'>".$data_name."</td>";
							echo "<td>".$data_state."</td>";
							echo "<td>".$data_chamber."</td>";
							if($data_bioguide_id=="NA"){
								echo "<td>View Details</td>";
							}
							else{
								echo "<td><a href='$url_view_details'> View Details</a></td>";
							}


							echo "</tr>";

						}

						echo "</table>";


					}
					else{
						echo "<h2>The API returned zero results for the request.<h2>";
					}

				}
				elseif ($str_db == "committees") {

					$str_chamber_com =$_POST["chamber"];


					$str_keyword_com =strtoupper(trim((string)$_POST["text_keyword"]));
					$invalidStr_com = preg_match('/\s/',$str_keyword_com);

					if($invalidStr_com == 0){//checking for inavlid inputs like "aabdc bdaf"


						$str_http_request = $str_http_request.$str_db."?committee_id={$str_keyword_com}"."&chamber=".$str_chamber_com."&apikey=".$api_key;

						$str_json = file_get_contents($str_http_request);
						$parsed_data = json_decode($str_json,true);
						$row_count = (int)count($parsed_data['results']);

					}
					else{
						$row_count = 0;
					}
					if($row_count > 0)
					{
						echo "<table border = '1' width = '80%' style='margin:auto;border-style:solid;border-collapse: collapse;' id = 'table1'>";
						echo "<tr><th width='20%'>Committee ID</th><th width='40%'>Committee Name</th><th width='20%'>Chamber</th></tr>";

						for($x = 0; $x < $row_count; $x++){
							$comm_id = array_key_exists('committee_id', $parsed_data['results'][$x])?$parsed_data['results'][$x]['committee_id']:"NA";
							$comm_name = array_key_exists('name',$parsed_data['results'][$x])?$parsed_data['results'][$x]['name']:"NA";
							$chamber = array_key_exists('chamber',$parsed_data['results'][$x])?$parsed_data['results'][$x]['chamber']:"NA";

							echo "<tr>";

							echo "<td>".$comm_id."</td>";
							echo "<td>".$comm_name."</td>";
							echo "<td>".$chamber."</td>";

							echo "</tr>";

						}

						echo "</table>";

					}

					else{
						echo "<h2>The API returned zero results for the request.<h2>";
					}
				}

				elseif ($str_db == "bills") {

					$str_chamber_bil =$_POST["chamber"];

					$str_keyword_bil =strtolower(trim((string)$_POST["text_keyword"]));

					$invalidStr_bil = preg_match('/\s/',$str_keyword_bil);
					if($invalidStr_bil == 0){

						$str_http_request = $str_http_request.$str_db."?bill_id={$str_keyword_bil}&chamber={$str_chamber_bil}&apikey={$api_key}";

						$str_json = file_get_contents($str_http_request);
						$parsed_data = json_decode($str_json,true);
						$row_count = (int)count($parsed_data['results']);

					}
					else{
						$row_count = 0;
					}

					if($row_count > 0)
					{
						echo "<table border = '1' width = '80%' style='margin:auto;border-style:solid;border-collapse: collapse;' id = 'table1'>";
						echo "<tr><th width = '15%'>Bill ID</th><th width = '35%'>Short Title</th><th width = '15%'>Chamber</th><th width = '15%'>Details</th></tr>";

						for($x = 0; $x < $row_count; $x++){
							$bill_id = $parsed_data['results'][$x]['bill_id'];
							$short_title = array_key_exists('short_title',$parsed_data['results'][$x])?$parsed_data['results'][$x]['short_title']:"NA";
							$chamber = $parsed_data['results'][$x]['chamber'];

							$Details  = "db=bills&bill_id={$bill_id}&chamber={$str_chamber_bil}&text_keyword={$str_keyword_leg_o}";
							$url_view_details = "congress.php/?" . $Details;


							echo "<tr>";

							echo "<td>".$bill_id."</td>";
							echo "<td>".$short_title."</td>";
							echo "<td>".$chamber."</td>";
							echo "<td><a href='$url_view_details'> View Details</a></td>";

							echo "</tr>";

						}

						echo "</table>";

					}

					else{
						echo "<h2>The API returned zero results for the request.<h2>";
					}
				}

				elseif ($str_db == "amendments") {

					$str_chamber_amn =$_POST["chamber"];


					$str_keyword_amn =strtolower(trim((string)$_POST["text_keyword"]));
					$invalidStr_bil = preg_match('/\s/',$str_keyword_amn);

					if($invalidStr_bil == 0){
						$str_http_request = $str_http_request.$str_db."?amendment_id={$str_keyword_amn}&chamber={$str_chamber_amn}&apikey={$api_key}";

						$str_json = file_get_contents($str_http_request);
						$parsed_data = json_decode($str_json,true);
						$row_count = (int)count($parsed_data['results']);

					}
					else{
						$row_count = 0;

					}

					if($row_count > 0)
					{

						echo "<table border = '1' width = '80%' style='margin:auto;border-style:solid;border-collapse: collapse;' id = 'table1'>";;
						echo "<tr><th width = '20%'>Amendment ID</th><th width = '20%'>Amendment Type</th><th width = '20%'>Chamber</th><th width = '20%'>Introduced on</th></tr>";

						for($x = 0; $x < $row_count; $x++){
							$amend_id = $parsed_data['results'][$x]['amendment_id'];
							$amend_type = array_key_exists('amendment_type', $parsed_data['results'][$x])?$parsed_data['results'][$x]['amendment_type']:"NA";
							$chamber = $parsed_data['results'][$x]['chamber'];
							$intro_date = array_key_exists('introduced_on',$parsed_data['results'][$x])?$parsed_data['results'][$x]['introduced_on']:"NA";


							echo "<tr>";

							echo "<td>{$amend_id}</td>";
							echo "<td>{$amend_type}</td>";
							echo "<td>{$chamber}</td>";
							echo "<td>{$intro_date}</td>";

							echo "</tr>";

						}

						echo "</table>";

					}

					else{
						echo "<h2>The API returned zero results for the request.<h2>";
					}
				}



			}

			//////Implementation for View Details
			elseif(isset($_GET["bioguide_id"]) || isset($_GET["bill_id"]))
			{

				$api_key = "eb6c342bbcc448fb96a33f3a8dca3b98";
				$str_http_request = "http://congress.api.sunlightFoundation.com/";

				$str_db =$_GET["db"];
				$str_chamber =$_GET["chamber"];

				//make the http request url
				if($str_db == "legislators")
				{

					$str_bioguide_id = $_GET["bioguide_id"];
					$str_http_request = $str_http_request.$str_db."?chamber={$str_chamber}&bioguide_id={$str_bioguide_id}&apikey={$api_key}";

					//Get the json formatted string
					$str_json = file_get_contents($str_http_request);
					$parsed_data = json_decode($str_json,true);
					$row_count = (int)count($parsed_data['results']);

					if($row_count > 0){

						$img_path="https://theunitedstates.io/images/congress/225x275/{$str_bioguide_id}.jpg";

						echo "<div  style='border:1px solid black;padding:20px;margin:auto;width:70%'>";

						echo "<img src='{$img_path}' height='275px' width='225px' style='margin-bottom:15px;margin-top:10px'>";

						$title_leg_vd= array_key_exists('title', $parsed_data['results']['0'])?$parsed_data['results']['0']['title']:"";
						$fname_leg_vd = array_key_exists('first_name', $parsed_data['results']['0'])?$parsed_data['results']['0']['first_name']:"";
						$lname_leg_vd = array_key_exists('last_name', $parsed_data['results']['0'])?$parsed_data['results']['0']['last_name']:"";

						$fullName = trim($title_leg_vd. " ". $fname_leg_vd. " ". $lname_leg_vd);


						$fullName_wo_title= trim($fname_leg_vd. " ". $lname_leg_vd);;
						$termEnd = array_key_exists('term_end', $parsed_data['results']['0'])?$parsed_data['results']['0']['term_end']:"NA";
						$website = array_key_exists('website', $parsed_data['results']['0'])?$parsed_data['results']['0']['website']:"NA";
						$office = array_key_exists('office',$parsed_data['results']['0'])?$parsed_data['results']['0']['office']:"NA";
						$facebook =array_key_exists('facebook_id', $parsed_data['results']['0'])?$parsed_data['results']['0']['facebook_id']:"NA";
						$twitter = array_key_exists('twitter_id',$parsed_data['results']['0'])?$parsed_data['results']['0']['twitter_id']:"NA";


						echo "<table width = '60%'  style='margin:auto;'>";


						echo "<tr>";
						echo "<td align='left' width = '30%'>Full Name</td>";
						echo "<td align='left' width = '30%' style='padding-left:10px;'>{$fullName}</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '30%'>Term Ends On</td>";
						echo "<td align='left' width = '30%' style='padding-left:10px;'>{$termEnd}</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '30%'>Website</td>";
						if($website == "NA"|| $website==""){
							echo "<td align='left' width = '30%' style='padding-left:10px;'>{$website}</td>";
						}
						else{
							echo "<td align='left' width = '30%' style='padding-left:10px;'><a href='{$website}' target='_blank'>{$website}</a></td>";
						}

						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '30%'>Office</td>";
						echo "<td align='left' width = '30%' style='padding-left:10px;'>{$office}</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '30%'>Facebook</td>";

						if($facebook == "NA" || $facebook == ""){
							echo "<td align='left' width = '30%' style='padding-left:10px;'>{$facebook}</td>";
						}
						else{
							echo "<td align='left' width = '30%' style='padding-left:10px;'><a href='https://www.facebook.com/{$facebook}' target='_blank'>{$fullName_wo_title}</a></td>";
						}

						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '30%'>Twitter</td>";

						if($twitter == "NA" || $twitter == ""){
							echo "<td align='left' width = '30%' style='padding-left:10px;'>{$twitter}</td>";
						}
						else{
							echo "<td align='left' width = '30%' style='padding-left:10px;'><a href='https://www.twitter.com/{$twitter}' target='_blank'>{$fullName_wo_title}</a></td>";
						}

						echo "</tr>";

						echo "</table>";
						echo "</div>";
					}
				}

				elseif($str_db == "bills")
				{
					$str_bill_id = $_GET["bill_id"];
					$str_http_request = $str_http_request.$str_db."?bill_id={$str_bill_id}&chamber={$str_chamber}&apikey={$api_key}";

					$str_json = file_get_contents($str_http_request);
					$parsed_data = json_decode($str_json,true);
					$row_count = (int)count($parsed_data['results']);

					if($row_count>0){
						$bill_title = array_key_exists('short_title', $parsed_data['results']['0'])?$parsed_data['results']['0']['short_title']:"NA";

						$title_bil_vd= array_key_exists('title', $parsed_data['results']['0']['sponsor'])?$parsed_data['results']['0']['sponsor']['title']:"";
						$fname_bil_vd = array_key_exists('first_name', $parsed_data['results']['0']['sponsor'])?$parsed_data['results']['0']['sponsor']['first_name']:"";
						$lname_bil_vd = array_key_exists('last_name', $parsed_data['results']['0']['sponsor'])?$parsed_data['results']['0']['sponsor']['last_name']:"";

						$sponsor = trim($title_bil_vd. " ". $fname_bil_vd. " ". $lname_bil_vd);

						$intoduced = array_key_exists('introduced_on',$parsed_data['results']['0'])?$parsed_data['results']['0']['introduced_on']:"NA";

						$lst_ver = array_key_exists('version_name',$parsed_data['results']['0']['last_version'])?$parsed_data['results']['0']['last_version']['version_name']:"";

						$lst_actn = array_key_exists('last_action_at',$parsed_data['results']['0'])?$parsed_data['results']['0']['last_action_at']:"";

						if($lst_actn != "" && $lst_ver!= ""){
							$last_action_date = $lst_ver. ",".$lst_actn;

						}
						elseif($lst_ver!= ""){
							$last_action_date = $lst_ver;
						}
						elseif($lst_actn!= ""){
							$last_action_date = $lst_actn;
						}



						$bill_url = array_key_exists('pdf',$parsed_data['results']['0']['last_version']['urls'])?$parsed_data['results']['0']['last_version']['urls']['pdf']:"NA";

						echo "<div  style='border:1px solid black;padding:20px;margin:auto;width:80%'>";

						echo "<table style='margin:auto;width:60%'>";

						echo "<tr>";
						echo "<td align='left' width = '10%' style='padding-left:0px'>Bill ID</td>";
						echo "<td align='left' width = '50%' style='padding-left:10px'>{$str_bill_id}</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '10%'>Bill Title</td>";
						echo "<td align='left' width = '50%'style='padding-left:10px'>{$bill_title}</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '10%'>Sponsor</td>";
						echo "<td align='left' width = '50%' style='padding-left:10px'>{$sponsor}</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '10%'>Introduced On</td>";
						echo "<td align='left' width = '50%' style='padding-left:10px'>{$intoduced}</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '10%'>Last action with date</td>";
						echo "<td align='left' width = '50%' style='padding-left:10px'>{$last_action_date}</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td align='left' width = '10%'>Bill URL</td>";
						if($bill_url == "NA" || $bill_url == ""){
							echo "<td align='left' width = '40%'>{$bill_url}</td>";
						}
						else{
							if($bill_title=="" || $bill_title=="NA") {
								echo "<td align='left' width = '50%' style='padding-left:10px'><a href='{$bill_url}' target='_blank'>{$str_bill_id}</a></td>";
							}
							else{
								echo "<td align='left' width = '50%' style='padding-left:10px'><a href='{$bill_url}' target='_blank'>{$bill_title}</a></td>";
							}
						}

						echo "</tr>";

						echo "</table>";
						echo "</div>";
					}
				}

			}
			?>
		</pre>
	</div>

<!-- Output-->
</body>

<script type="text/javascript">

/*Function sets the keyword based on the chosen Congress Database
*For Legislators: “State/Representative*”
*For Committees: “Committee ID*”
*For Bills: “Bill ID*”
*For Amendments: “Amendment ID*”
*/



function setKeyword(str_selctedOptn){

	var frm_keyword = document.getElementById('keywd');

	if(str_selctedOptn == "legislators"){
		frm_keyword.innerHTML = 'State/Representative*';

	}
	else if(str_selctedOptn == "committees"){
		frm_keyword.innerHTML = 'Committee ID*';

	}

	else if(str_selctedOptn == "bills"){
		frm_keyword.innerHTML = 'Bill ID*';

	}

	else if(str_selctedOptn == "amendments"){
		frm_keyword.innerHTML = 'Amendment ID*';

	}

	else {
		frm_keyword.innerHTML = 'Keyword*';

	}

}

//Function clears the form fields
function clearForm(){
	clearResult();
	document.searchForm.db.options[0].selected='selected';
	document.searchForm.text_keyword.text="";
	document.getElementById("keywd").innerHTML = 'Keyword*';


}

function clearResult(){
	//location.href="http://localhost/congress.php";
	location.href="http://cs-server.usc.edu:59544/congress.php"
	document.getElementById("result").innerHTML="";

}

function validateForm(frm,isAlert){

	str = "Please enter the following missing information: ";
	noError = true;
	hasOne = false;

	if (frm.db.options[frm.db.selectedIndex].value == "default"){
		str += "Congress database";
		hasOne = true;
		noError = false;
	}

	if(frm.text_keyword.value.trim() == ""){
		noError = false;

		if(hasOne){
			str += " ,keyword";
		}
		else{
			str += "keyword";
		}
		hasOne = true;

	}

	if(hasOne && isAlert) alert (str);
	return noError;

}


</script>
</html>
