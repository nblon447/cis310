
function isValid() {
    var email = document.getElementById("email");
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var radioGrade = document.querySelectorAll('input[name="grade"]');
    var radioPizza = document.querySelectorAll('input[name="pizza"]');

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
	var search = document.getElementById("search");
	console.log(search);
	if (search.value) {
		return true;
	}
	toggleError(true,'nullInputError');
	return false;
}

function isNotNull(inputGroup) {
    for(var i = 0; i < inputGroup.length; i++) {
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
