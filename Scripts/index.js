const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;

	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
	event.preventDefault();
	
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
  
	if (username === 'AdminSEF123' && password === 'SeF@ctORy$$456') {
	
		window.location.href = 'index.html'; 
	  console.log('You have successfully logged in.');
	} else {
	  alert('Invalid username or password. Please try again!');									
	}
  });
  