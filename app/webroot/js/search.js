// JavaScript Document
function changeAction() {
	var x = document.form.saerchType.selectedIndex;
	var action = document.form.saerchType.options[x].value;
	document.getElementById("LibrarySearchForm").action = "/" + action + "/search";
}
 