<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Add new</title>
	<link rel="shortcut icon" href="icons8-contacts.svg" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
		rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<script 
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
	body{
		background:-webkit-linear-gradient(left, black, darkslategray);
	}
	.contact-form{
		background: #fff;
		margin-top: 10%;
		margin-bottom: 5%;
		width: 70%;
	}
	.contact-form .form-control{
		border-radius:1rem;
	}
	.contact-image{
		text-align: center;
	}
	.contact-image img{
		border-radius: 50%;
		margin-top: -8%;
		width: 150px;
		height: 150px;
		border-style: solid;
		border-color: white;
		background-color: white;
	}
	.contact-form form{
		padding: 14%;
		text-align: center;
	}
	.contact-form form .row{
		margin-bottom: -7%;
		text-align: center;
	}
	.contact-form h3{
		margin-bottom: 8%;
		margin-top: -10%;
		text-align: center;
		color: #0062cc;
	}
	.contact-form .btnContact {
		width: 50%;
		border: none;
		border-radius: 1rem;
		padding: 1.5%;
		background: #dc3545;
		font-weight: 600;
		color: #fff;
		cursor: pointer;
	}
	</style>
  <script>
    function new_submit(){
		var name = $("#name").val();
		var number = $("#number").val();
		name = name.trim();
		number = number.trim();
		var request = [name,number];
		if(name != "" && number != ""){
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "newContact.php", true);
			xhttp.onreadystatechange = function ()
			{
				if(xhttp.readyState === XMLHttpRequest.DONE) {
					var myresponse = xhttp.responseText;
					alert(myresponse);
					if(myresponse == "Contact successfully added"){
						window.location.replace("Contacts.php");
					}
				}
			}
			xhttp.send(request);
		}
		else alert("Please enter all field");
	}
  </script>
</head>
<body>
	<div class="container contact-form">
		<div class="contact-image">
			<img src="Google_Contacts_logo.PNG" alt="google_logo" width="40" height="40" class="d-inline-block align-text-top">
		</div>
		<form>
			<h3>Create new contact</h3>
		    <div class="row">
				<div class="col-md-6" style="margin-left: 25%">
					<div class="form-group">
						<input id="name" type="text" placeholder="Name *" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
					</div>
					<div class="form-group">
						<input id="number" type="text" placeholder="Phone Number *" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
					</div>
					<div class="form-group">
						<button type="button" class="btnContact" onclick="new_submit()">Add Contact</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>