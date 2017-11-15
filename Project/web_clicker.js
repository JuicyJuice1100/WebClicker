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
function addRadio() {
  document.getElementById("add_radio").style.display = "block";
  document.getElementById("add_checkbox").style.display = "none";
  document.getElementById("add_text").style.display = "none";
  document.getElementById("add_tf").style.display = "none";
}
function addCheckbox() {
  document.getElementById("add_radio").style.display = "none";
  document.getElementById("add_checkbox").style.display = "block";
  document.getElementById("add_text").style.display = "none";
  document.getElementById("add_tf").style.display = "none";
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

function submitPasswordChangeStudent() {
	
}
function submitPasswordChangeInstructor() {
	
}
function addNewQuestion() {
	
}
function searchQuestion() {
	
}
function displayQuestion(x){
	if(document.getElementById("question" + x).style.display == "block"){
		document.getElementById("question" + x).style.display = "none";
		document.getElementById("button" + x).innerHTML = "view question";
	}
	else{
		document.getElementById("question" + x).style.display = "block";
		document.getElementById("button" + x).innerHTML = "hide question";
	}
}
function deactivateQuestion(x){
	
}
function editQuestion(x){
	
}
function deleteQuestion(x){
	
}

if(document.getElementById("defaultOpen")){
    document.getElementById("defaultOpen").click();
}