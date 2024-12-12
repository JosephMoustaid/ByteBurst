function isValidPassword(password) {
	// Your password validation logic
	return password.length >= 8;
}

function isValidEmail(email) {
	// Your email validation logic
	const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	return emailRegex.test(email);
}



function validateForm() {
	// Get form values
	const password = document.getElementById("password").value;
	const email = document.getElementById("email").value;

	// Perform validation
	if (
		isValidPassword(password) &&
		isValidEmail(email) 
	) {
		alert("Form submitted successfully!");
		// You can submit the form here if needed
	} else {
		alert("Invalid input detected. Please check your information.");
		// Prevent the form from submitting
		event.preventDefault();
	}
}

