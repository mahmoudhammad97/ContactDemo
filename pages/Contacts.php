<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PhoneBook</title>
  <link rel="shortcut icon" href="../img/icons8-contacts.svg" />
  <link 
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <script 
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
	//////////////////// get all contact or find specific contact by search by name ////////////////////
	function Get_Contact(str="def") {
		str = str.trim();
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "../CRUD/search.php", true);
		xhttp.onreadystatechange = function ()
		{
			if(xhttp.readyState === XMLHttpRequest.DONE) {
				var myresponse = JSON.parse(xhttp.responseText);	//convert json to array
				const Table = document.getElementById("table");
				while (Table.hasChildNodes())
				{
					Table.removeChild(Table.firstChild);
				}
				for(var i=0; i < myresponse.length; i++)
				{
					//============== rgp(random_num1,random_num2,random_num3) === number created between (0,255) ===========
					const random_num1 = Math.floor(Math.random() * 256);
					const random_num2 = Math.floor(Math.random() * 256);
					const random_num3 = Math.floor(Math.random() * 256);
					
$("#table").append(
"<tr>"+
	"<th style=\"width: 140px;\">"+
		"<div style=\"background-color:rgb("+random_num1+","+random_num2+","+random_num3+");"+
		"border-radius:50%;width:62px;height:62px;text-align:center;margin: auto;margin-top: 2px;\">"+
			"<span style=\"font-size=86px;font-weight:bold;font-size:50px;top:-15px;position:relative;\">"+
			myresponse[i]['Name'][0]+
			"</span>"+
		"</div>"+
	"</th>"+
	"<th id=\""+myresponse[i]['id']+"\" style=\"font-weight:bold;font-size:40px;cursor: pointer\" onclick=\"pass_id(this.id)\">"+
		myresponse[i]['Name']+
	"</th>"+
"</tr>");
				}
			}
		}
		xhttp.send(str);
	}
	//////////////////// Add new contact ////////////////////
	function new_contact(){
		window.open("Create.php",'_self');
	}
	//////////////////// pass id of contact to getInfo page ////////////////////
	function pass_id(id){
		localStorage.setItem('pass-id',id);		//pass id to getInfo page
		var name= document.getElementById(id).innerHTML;	//name of contact that clicked it
		localStorage.setItem('pass-name',name); //pass name to getInfo page
		window.open("getInfo.php",'_self');			//view all numbers in same tape
	}
  </script>
  <style>
  .bg-light
  {
	background:-webkit-linear-gradient(left, black, darkslategray) !important
  }
  .container-fluid
  {
	  margin-top: 5px;
  }
  </style>
</head>
<body onload="Get_Contact()" style="background:-webkit-linear-gradient(left, black, darkslategray);">
<!----------------------Contacts---------------------->
	<nav class="navbar navbar-light bg-light">
	  <div class="container-fluid d-flex justify-content-center">
		  <img src="../img/Google_Contacts_logo.PNG" alt="google_logo" width="50" height="50" class="d-inline-block align-text-top">
		  <h2 style="color: white;font-size:40px">Contacts</h2>
	  </div>
	</nav>
	<div style="padding: 10px;background: #fff;">	
		<form class="d-flex">
			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" 
			onkeyup="Get_Contact(this.value)" style="border-radius: 1rem">
			
			<img src="../img/icons8-plus.png" onclick="new_contact()" class="material-symbols-outlined" style="cursor:pointer">
		</form>
	</div>
<!----------------------table---------------------->
<table class="table table-dark table-striped">
  <tbody id="table">
  <!----------------------name contact---------------------->
		<!-- create <tr><th></th></tr> by JS -->
  <!----------------------end contact---------------------->
  </tbody>
</table>
</body>