<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Contact</title>
  <link rel="shortcut icon" href="icons8-contacts.svg" />
  <link 
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <script 
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body style="background: -webkit-linear-gradient(left, black, darkslategray)">
		<div class="card" 
		style="background: -webkit-linear-gradient(left, black, darkslategray);position: relative;width: 100%;height: 100%;padding: 0 50px 60px 50px;">
			<!--div as circle img-->
			<div class="container" 
			style="background-color:#fb3d02;border-radius:50%;width:70px;height:70px;text-align:center;margin-top: 50px;">
				<span id="firstChar" style="font-size=86px;font-weight:bold;font-size:44px"><!--first character from name contact--></span>
			</div>
			<!--Name contact-->
			<div class="card-body container" style="text-align:center">
				<h2 id="nameContact" style="color: beige;"><!--name contact comes from JS--></h2>
			</div>
			<!--add new number phone of this contact-->
			<div class="list-group" id="newNumber" style="display:table;border:0px">
				<div class="list-group-item list-group-item-action list-group-item-light" 
				style="cursor:pointer;text-align: center;width: fit-content;margin-left: auto;padding:0px" onclick="inputNumber()">
					<img src = "plus-square.svg" alt="My Happy SVG" style="width:40px"/>
				</div>
			</div>
		</div>
<script>
	var getId = localStorage.getItem('pass-id');		 //get id contact from parent page
	var getName = localStorage.getItem('pass-name');  	//get name contact from parent page
	document.title = getName;		//set title page with name contact
	//const div = $(".card").append("<div class=\"list-group\"></div>");		///////////////implement show number in card///////////////
	$("#nameContact").html(getName);			 		//show name contact in page
	$("#firstChar").html(getName[0].toUpperCase()); //show first character of name contact as img
	var myresponse = [];		
	show_number();
	//================ initialize page and get all numbers of this contact from database ================
	function show_number(){
		var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "show.php", true);
			xhttp.onreadystatechange = function ()
			{
				if(xhttp.readyState === XMLHttpRequest.DONE) {
					myresponse = JSON.parse(xhttp.responseText);		//all numbers for specifc contact
					add_number(myresponse);
				}
			}
			xhttp.send(getId);
	}
	//============================================== show all numbers of this contact ==============================================
	function add_number(getResponse)
	{	
		var j = 0;  // to select style in switch cases in for loop
		//loop on all numbers of this contact
		for(var i=0; i < getResponse.length; i++)		
		{	
			$(".list-group").append(
		"<div id=\""+i+"\">"+
			"<img src=\"trash-2.svg\" style=\"float:right;cursor:pointer\" onclick=\"delete_num(this.parentNode.textContent)\"/>"+
			"<img src=\"refresh-cw.svg\" style=\"float:right;margin-right:20px;cursor:pointer\" onclick=\"update_num(this.parentNode.textContent)\"/>"+
		"</div>");
			switch(j){	//style number color if contact have several numbers
				case 0:
					$("#"+i).addClass("list-group-item list-group-item-action list-group-item-primary");
					$("#"+i).attr("style","margin-bottom: 15px;");
					j++;
					break;
				case 1:
					$("#"+i).addClass("list-group-item list-group-item-action list-group-item-secondary");
					$("#"+i).attr("style","margin-bottom: 15px;");
					j++;
					break;
				case 2:
					$("#"+i).addClass("list-group-item list-group-item-action list-group-item-success");
					$("#"+i).attr("style","margin-bottom: 15px;");
					j++;
					break;
				case 3:
					$("#"+i).addClass("list-group-item list-group-item-action list-group-item-danger");
					$("#"+i).attr("style","margin-bottom: 15px;");
					j = 0;
					break;
			}
			//enter number to html
			$("#"+i).append(getResponse[i]['number']);
		}
	}
	//============================================== Create input field to add number for exist contact ==============================================
	function inputNumber(){	
		const input = $("#newNumber").append("<input class=\"form-control me-2\" id=\"inputNewNumber\">");
		const button = $("#newNumber").append("<button class=\"btn btn-light\" onclick=\"addNew()\">Add</button>");
	}
	//============================================== Request to database to add number ==============================================
	function addNew(){
		const input_num = $("#inputNewNumber").val();//get new number from input
		var request = [getId , input_num];  //[id of this contact , new number of contact]
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "addExist.php", true);
			xhttp.onreadystatechange = function ()
			{
				if(xhttp.readyState === XMLHttpRequest.DONE) {
					var myresponse = xhttp.responseText;
					alert(myresponse);
					location.reload(); 
				}
			}
				xhttp.send(request);
	}
	//====================== Update number phone in database ======================
	function update_num(value)
	{
		var updated_num = window.prompt('This number '+value+' It will be updated'); //enter updated number 
		var number_old_new = [value , updated_num];
		var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "update.php", true);
			xhttp.onreadystatechange = function ()
			{
				if(xhttp.readyState === XMLHttpRequest.DONE) {
					var myresponse = xhttp.responseText;
					alert(myresponse);
					location.reload(); 
				}
			}
				xhttp.send(number_old_new);
	}
	//====================== Delete number phone from database ======================
	function delete_num(value)
	{
		var id_and_number =[getId , value];
		if(confirm("Are you sure you want to delete this number ( "+value+" )?"))
		{
			var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "delete.php", true);
				xhttp.onreadystatechange = function ()
				{
					if(xhttp.readyState === XMLHttpRequest.DONE) {
						var myresponse = xhttp.responseText;
						if(myresponse == "remove person"){ window.location.replace("Contacts.php"); }
						else location.reload();
					}
				}
					xhttp.send(id_and_number);
		}
	}
</script>
</body>