// Script 10.7- register.js
// This script validates a form.

// Function called when the form is submitted.
// Function validates the form data.
function validateForm(e) {
    'use strict';

    // Get the event object:
	if (typeof e == 'undefined') e = window.event;

    // Get form references:
	var firstName = U.$('firstName');
	var email = U.$('email');
	var phone = U.$('phone');
	var categories = U.$('categories');
	var message = U.$('message');
	var terms = U.$('terms');

	// Flag variable:
	var error = false;

	// Validate the first name:
	if (/^[A-Z \.\-']{2,20}$/i.test(firstName.value)) {
		removeErrorMessage('firstName');
		addCorrectMessage('firstName', '✓ Correct');
	} else {
		addErrorMessage('firstName', 'Please enter your name.');
		removeCorrectMessage('firstName');
		error = true;
	}


	// Validate the email address:
	if (/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/.test(email.value)) {
		removeErrorMessage('email');
		addCorrectMessage('email', '✓ Correct');
	} else {
		addErrorMessage('email', 'Please enter your email address.');
		removeCorrectMessage('email');
		error = true;
	}
	
	// Validate the phone number:
	if (/\d{3}[ \-\.]?\d{3}[ \-\.]?\d{4}/.test(phone.value)) {
		removeErrorMessage('phone');
		addCorrectMessage('phone', '✓ Correct');
	} else {
		addErrorMessage('phone', 'Please enter your phone number.');
		removeCorrectMessage('phone');
		error = true;
	}

	
	
	// Validate the Type of event:
	if (categories.selectedIndex != 0) {
		removeErrorMessage('categories');
		addCorrectMessage('categories', '✓ Correct');
	} else {
		addErrorMessage('categories', 'OPS! You did not choose any category.');
		removeCorrectMessage('categories');
		error = true;
	}
	// Validate the last name:
	if (/^[A-Z \.\-']{10,250}$/i.test(message.value)) {
		removeErrorMessage('message');
		addCorrectMessage('message', '✓ Correct');
	} else {
		addErrorMessage('message', 'OPS! Your message is too short or empty');
		removeCorrectMessage('message');
		error = true;
	}




	
	
	
	

    // If an error occurred, prevent the default behavior:
	if (error) {

		// Prevent the form's submission:
	    if (e.preventDefault) {
	        e.preventDefault();
	    } else {
	        e.returnValue = false;
	    }
	    return false;
    
	}
    
} // End of validateForm() function.

// Function called when the terms checkbox changes.
// Function enables and disables the submit button.
function toggleSubmit() {
	'use strict';
    
	// Get a reference to the submit button:
	var submit = U.$('submit');
	
	// Toggle its disabled property:
	if (U.$('terms').checked) {
		submit.disabled = false;
	} else {
		submit.disabled = true;
	}
	
} // End of toggleSubmit() function.

// Establish functionality on window load:
window.onload = function() {
    'use strict';

	// The validateForm() function handles the form:
    U.addEvent(U.$('theForm'), 'submit', validateForm);

	// Disable the submit button to start:
	U.$('submit').disabled = true;

	// Watch for changes on the terms checkbox:
    U.addEvent(U.$('terms'), 'change', toggleSubmit);

	// Enbable tooltips on the phone number:
	U.enableTooltips('phone');

};