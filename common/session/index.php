<!DOCTYPE html>
	<html lang="en">

	<head class=header>
		<?php //$IPATH = $_SERVER["DOCUMENT_ROOT"]."/Projects/SpeechDriven_WebApp/common/"; include($IPATH."header.html"); ?>
	</head>

	<body class="body">
		
		<nav class="navi navbar navbar-default">
			<?php //include($IPATH."navbar.html"); ?>
		</nav>

		<div>
			<h1> Welcome to myCatalog </h1>
			<p id="speech_error_message" hidden aria-hidden="true">   
			</p>
		</div>

		<div class="Container">
			<br><br>
			<span id='Command'></span>
			<br><br>
			
			<!-- <li><button id="command_button">Start 🎙 listening</button></li> -->
			<table class="table table-striped" >
				<thead>
					<th>Item Name</th>
					<th>Item Owner</th>
					<th>Item Category</th>
					<th>Item Image</th>
				</thead>
				<tbody>
					<?php
						require_once('pages/appvars.php');
						require_once('pages/connectvars.php');
						
						//connect to DB
						$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
							or die('Error connecting to Database');
						
						// Retrieve the score data from MySQL
						$query = "SELECT * FROM product_tbl";
						$result = mysqli_query($dbc, $query)
									or die('Error querying database.');
						
						//$row = mysqli_fetch_array($result);

						while($row = mysqli_fetch_array($result)) {
							echo '<tr>';
							echo '<td>'.$row['pxtName'].'</td>';
							echo '<td>'.$row['owner'].'</td>';
							echo '<td>'.$row['pxtCategory'].'</td>';
							echo '<td><img src="data:image/jpg;Base64,'.base64_encode($row['pxtImage']).'" width="40" height="50"/></td>';
							echo '</tr>';

						}
						
						mysqli_close($dbc);	
							
							//echo '<img src="data:image/jpeg;base64,'. base64_encode($image) .'" />';
					?>
				</tbody>
			</table>
			
		</div>


		<footer class="footer">
			<?php //include($IPATH."footer.html"); ?>
		</footer>

		<script src="/Projects/SpeechDriven_WebApp/jquery/jquery-1.9.1.js"></script>
	<script src="/Projects/SpeechDriven_WebApp/bootstrap/3.3.6/bootstrap.min.js"></script>
		<script>
		$(function(){
		$(".header").load("/Projects/SpeechDriven_WebApp/common/header.html"); 
		$(".navbar").load("/Projects/SpeechDriven_WebApp/common/navbar.html");
		$(".footer").load("/Projects/SpeechDriven_WebApp/common/footer.html"); 
		});
			"use strict";
			window.addEventListener("DOMContentLoaded", () => {
				const button = document.getElementById("command_button");
				let SE_message = document.getElementById("speech_error_message");
				//const result = document.getElementById("result");
				//const main  = document.getElementsByTagName("main")[0];
				//const button = document.getElementByClass("");
				

				const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
				const SpeechGrammarList = window.SpeechGrammarList || window.webkitSpeechGrammarList;

				if(typeof SpeechRecognition === "undefined") {

					//We don't have acceess to SpeechRecognition
					button.remove();
					SE_message.textContent = 'Sorry your browser does not support Speech Recognition ' + event.error;
					SE_message.removeAttribute("hidden");
					SE_message.setAttribute("aria-hidden", "false");
				}else {



					var grammar = '#JSGF V1.0;'

					var recognition = new SpeechRecognition();
					var speechRecognitionList = new SpeechGrammarList();
					speechRecognitionList.addFromString(grammar, 1);
					recognition.grammars = speechRecognitionList;
					recognition.lang = 'en-US';
					recognition.interimResults = false;


					recognition.onresult = function(event) {
					var last = event.results.length - 1;
					var command = event.results[last][0].transcript;
					Command.textContent = 'Voice Input: ' + command + '.';

					if(command.toLowerCase() === 'login button'){
						document.getElementById("login_btn").click();// = true;
					}
					
					if (command.toLowerCase() === 'sign up button'){
						document.getElementById('signup_btn').click();//checked = true;
					}
/*
					else if (command.toLowerCase() === 'select bruce'){
									document.querySelector('#chkBruce').checked = true;
								}
								else if (command.toLowerCase() === 'select nick'){
									document.querySelector('#chkNick').checked = true;
								}   */
							};

							recognition.onspeechend = function() {
								recognition.stop();
								button.textContent = "Start listening";
							};

							recognition.onerror = function(event) {
								SE_message.textContent = 'Error occurred in recognition: ' + event.error;
								SE_message.removeAttribute("hidden");
								SE_message.setAttribute("aria-hidden", "false");
							}        
							//let button1 = document.getElementById('command_button');
							button.addEventListener('click', function(){
								recognition.start();
								button.textContent = "Stop listening";
							});
/*
							let listening = false;
							//const recognition = new SpeechRecognition();
							const start = () => { 
							recognition.start(); //start recognition
							button.textContent = "Stop listening"; //change button content to stop listening
							//main.classList.add("speaking"); //Add Animation showing speaking
							};
*/					
					
					/*

					 //We have access to  SpeechRecognition
					/* 
					let listening = false;
					const recognition = new SpeechRecognition();
					const start = () => { 
					recognition.start(); //start recognition
					button.textContent = "Stop listening"; //change button content to stop listening
					//main.classList.add("speaking"); //Add Animation showing speaking
					};
/*
					const stop = () => {
					recognition.stop(); //Stop recognition
					button.textContent = "Start listening"; //change button content to start listening
					//main.classList.remove("speaking"); //Remove animation showing speaking
					};
*/
					
			//var message = document.querySelector('#message');

			//var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;

			
        

				/*	
					const onResult = event => {
					result.innerHTML = "";
					for (const res of event.results) {
						const text = document.createTextNode(res[0].transcript);
						const p = document.createElement("p");
						if(res.isFinal) {
						p.classList.add("final");
						}
						p.appendChild(text);
						result.appendChild(p);
					}   
					};
				

					recognition.continuous = true;
					recognition.interimResults = true;
					recognition.addEventListener("result", onResult);

					button.addEventListener("click", () => {
						listening ? stop() : start();
						listening = !listening;
					});*/
				}
				});

		
		</script>

	</body>


</html>

