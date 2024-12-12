function isValidPassword(password) {
	// Your password validation logic
	return password.length >= 8;
}

function isValidEmail(email) {
	// Your email validation logic
	const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	return emailRegex.test(email);
}

function isValidDate(date) {
	// Your date validation logic
	const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
	return dateRegex.test(date);
}

function isValidName(name) {
	// Your name validation logic
	const nameRegex = /^[A-Za-z]{2,}$/;
	return nameRegex.test(name);
}

function validateForm() {
	// Get form values
	const password = document.getElementById("password").value;
	const email = document.getElementById("email").value;
	const date = document.getElementById("birthdate").value;
	const firstName = document.getElementById("firstname").value;
	const lastName = document.getElementById("lastname").value;

	// Perform validation
	if (
		isValidPassword(password) &&
		isValidEmail(email) &&
		isValidDate(date) &&
		isValidName(firstName) &&
		isValidName(lastName)
	) {
		alert("Form submitted successfully!");
		// You can submit the form here if needed
	} else {
		alert("Invalid input detected. Please check your information.");
		// Prevent the form from submitting
		event.preventDefault();
	}
}

