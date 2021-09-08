
"use strict";
window.addEventListener("DOMContentLoaded", () => {
	const button = document.getElementById("command_button");
	let SE_message = document.getElementsByClassName("speech_error_message");  //   getElementById("speech_error_message");



	const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
	const SpeechGrammarList = window.SpeechGrammarList || window.webkitSpeechGrammarList;

	if (typeof SpeechRecognition === "undefined") {

		//We don't have acceess to SpeechRecognition
		button.remove();
		SE_message.textContent = 'Sorry your browser does not support Speech Recognition ' + event.error;
		SE_message.removeAttribute("hidden");
		SE_message.setAttribute("aria-hidden", "false");
	} else {



		var grammar = '#JSGF V1.0;'

		var recognition = new SpeechRecognition();
		var speechRecognitionList = new SpeechGrammarList();
		speechRecognitionList.addFromString(grammar, 1);
		recognition.grammars = speechRecognitionList;
		recognition.lang = 'en-US';
		recognition.interimResults = false;


		recognition.onresult = function (event) {
			var last = event.results.length - 1;
			var command = event.results[last][0].transcript;
			Command.textContent = 'Voice Input: ' + command + '.';

			if (command.toLowerCase() === 'login button') {
				document.getElementById("login_btn").click();// = true;
			} 

			else if (command.toLowerCase() === 'sign up button') {
				document.getElementById('signup_btn').click();//checked = true;
			}
			
			else if (command.toLowerCase() === 'sign in button') {
				document.getElementById('login').click();//checked = true;
			}
			
			else if (command.toLowerCase() === 'home link') {
				// document.querySelector('#home_link');
				const link = document.getElementById('home_link')
				link.addEventListener('click', event => {
					// link clicked
				})
			}

			if (command.toLowerCase() === 'category link') {
				document.querySelector('#home_link');
				
			}
			/*
								else if (command.toLowerCase() === 'select bruce'){
												document.querySelector('#chkBruce').checked = true;
											}
											else if (command.toLowerCase() === 'select nick'){
												document.querySelector('#chkNick').checked = true;
											}   */
		};

		recognition.onspeechend = function () {
			recognition.stop();
			button.textContent = "Start 🎙 listening";
		};

		recognition.onerror = function (event) {
			SE_message.textContent = 'Error occurred in recognition: ' + event.error;
			SE_message.removeAttribute("hidden");
			SE_message.setAttribute("aria-hidden", "false");
		}

		button.addEventListener('click', function () {
			recognition.start();
			button.textContent = "Stop 🎙 listening";
		});

	}
});


