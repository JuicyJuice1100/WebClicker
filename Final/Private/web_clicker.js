function openTab(evt, userType) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i += 1) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i += 1) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(userType).style.display = "block";
    evt.currentTarget.className += " active";
}

window.onload = function() {
	if(document.getElementById("add_radio")){
		document.getElementById("add_radio").style.display = "none";
	}
	if(document.getElementById("add_checkbox")){
		 document.getElementById("add_checkbox").style.display = "none";
	}
	if(document.getElementById("add_text")){
		  document.getElementById("add_text").style.display = "none";
	}
	if(document.getElementById("add_tf")){
		 document.getElementById("add_tf").style.display = "none";
	}  
   
}

function addRadio() {
    document.getElementById("add_radio").style.display = "block";
    document.getElementById("add_checkbox").style.display = "none";
    document.getElementById("add_text").style.display = "none";
    document.getElementById("add_tf").style.display = "none";

    addRadioOptions();
}

function addRadioOptions() {
    var htmlElements = "";
    var container = document.getElementById("radio_container");
    container.innerHTML = htmlElements;

    var numOfAnswers = (document.getElementById("num_of_answers_radio").value * 1 + 1);

    for (var i = 1; i < numOfAnswers; i++) {
        htmlElements += '<input type="text" id="radio' + i + '" name="radio_question' + i + '"' +
            'placeholder="Enter a answer" ><input type="radio" name="answer_radio" value="' + i + '" >Correct answer'
    }

    container.innerHTML += htmlElements;
}

function addCheckbox() {
    document.getElementById("add_radio").style.display = "none";
    document.getElementById("add_checkbox").style.display = "block";
    document.getElementById("add_text").style.display = "none";
    document.getElementById("add_tf").style.display = "none";


    addCheckBoxOptions();
}

function addCheckBoxOptions() {
    var htmlElements = "";
    var container = document.getElementById("checkbox_container");
    container.innerHTML = htmlElements;

    var numOfAnswers = (document.getElementById("num_of_answers_checkbox").value * 1 + 1);

    for (var i = 1; i < numOfAnswers; i++) {
        htmlElements += '<input type="text" id="checkbox' + i + '" name="checkbox_question' + i + '"' +
            'placeholder="Enter a answer" ><input type="checkbox" name="' + i + '" value="' + i + '">Correct answer'
    }

    container.innerHTML += htmlElements;
}
function navigateToQuestions(){
	window.location.href = "./questions_instructor.php";
}

function addText() {
    document.getElementById("add_radio").style.display = "none";
    document.getElementById("add_checkbox").style.display = "none";
    document.getElementById("add_text").style.display = "block";
    document.getElementById("add_tf").style.display = "none";
}

function addTF() {
    document.getElementById("add_radio").style.display = "none";
    document.getElementById("add_checkbox").style.display = "none";
    document.getElementById("add_text").style.display = "none";
    document.getElementById("add_tf").style.display = "block";
}

function displayQuestion(x) {
    if (document.getElementById("question" + x).style.display == "block") {
        document.getElementById("question" + x).style.display = "none";
        document.getElementById("button" + x).innerHTML = "view question";
    } else {
        document.getElementById("question" + x).style.display = "block";
        document.getElementById("button" + x).innerHTML = "hide question";
    }
}

function redirect() {
    var url = "http://webdev.cs.uwosh.edu/students/seymej72/TeamProject/grade.php";
    window.location = url;
}

function disableSubmit() {
    var attribute = document.createAttribute("disabled");
    var button = document.getElementById("submitButton");
    button.setAttributeNode(attribute);
    
}

if (document.getElementById("defaultOpen")) {
    document.getElementById("defaultOpen").click();
}
