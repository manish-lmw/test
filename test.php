
<script>
	var i = 0;
	var arr = new Array('A','S','D','F','J','K','L',';','G','H');
	//var arr = new Array('A','S','D','F');
	var currentChar = '';
	var keyPressed = 'test';
	var score = 0;
	function startTest(){
		document.getElementById('editor').focus();
		i = setInterval(function(){
			var len = arr.length;
			var num = Math.floor((Math.random()*len)+0);
			document.getElementById('showLetter').innerHTML = arr[num];
			currentChar = arr[num];
			if(keyPressed!='test'){
				if(keyPressed==''){
					score = score-0.5;
				}
			}
			keyPressed = '';
			timer = timer + 1;
		},1000);
	}
	
	function checkLetter(e){
		  document.getElementById('editor').value = '';
		  e = e || window.event; 
		  var charCode = e.charCode || e.keyCode;
		  character = String.fromCharCode(charCode);
		  keyPressed = character;
		  var otherCase = String.fromCharCode(currentChar.charCodeAt(0)+32); 
		  if(currentChar!=character && otherCase!=character){
		  	score = score - 1;
		  }else{
		  	score = score + 1;
		  }
		  document.getElementById('editor').value = '';
		  document.getElementById('editor').focus();
	}
	var interval = 0;
	var timer = 0;
	function setScore(){
		interval = setInterval(function(){
			document.getElementById('score').innerHTML = score;
			document.getElementById('time').innerHTML = timer;
		},100);
	}
	
	function pauseTest(){
		
	}
</script>
<html>
	<body onload="setScore()">
		<div id="criteria">
			Correct = +1
			Miss = -0.5
			Incorrect = -1
		</div>
		<div id="showLetter">
		
		</div>
		<div>
			<input id="editor" type="text" placeholder="Type Here" onkeypress="checkLetter(event)"/>
		</div>
		Your Score is: 
		<div id="score">
			
		</div>
		Time taken:
		<div id="time">
			
		</div>
		<button onclick="startTest()">
			Start Typing Test
		</button>
	</body>
</html>