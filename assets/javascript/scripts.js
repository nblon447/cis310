
function isValid() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const radioGrade = document.querySelectorAll('input[name="grade"]');
    const radioPizza = document.querySelectorAll('input[name="pizza"]');

    if (email.value 
        && isNotNull(checkboxes) 
        && isNotNull(radioGrade)
        && isNotNull(radioPizza)) {
        return true;
    }
    toggleError(true,'nullInputError');
    return false;
}

function isValidSearch() {
	if (search.value) {
		return true;
	}
	toggleError(true,'nullInputError');
	return false;
}

function isNotNull(inputGroup) {
    for(let i = 0; i < inputGroup.length; i++) {
        if(inputGroup[i].checked) {
            return true;
        }
    }
    return false;
}

function toggleError(show, elementRef) {
    if (show) {
        document.getElementById(elementRef).style.display = 'block';
        window.scrollTo({
            top: 50,
            behavior: 'smooth'
          });
        return;
    } else {
        document.getElementById(elementRef).style.display = 'none';
    }
}



/* __ LOGIN PAGE VALIDATION __ */

function LoginValidation() {
	var user = document.login.username;
	var pass = document.login.password;
	
	if (user == "") {
		alert ("Please enter your username.");
		return false;
	}
	
	
	if (pass == "") {
		alert ("Please enter your password.");
		return false;
	}
	
}
