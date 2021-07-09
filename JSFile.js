/*Tooltip using Jquery*/
$(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function () {
	$("#flip1").click(function () {
		$("#panel1").toggle();
	});
});

$(document).ready(function () {
	$("#flip2").click(function () {
		$("#panel2").toggle();
	});
});

$(document).ready(function () {
	$("#flip3").click(function () {
		$("#panel3").toggle();
	});
});

$(document).ready(function () {
	$("#flip4").click(function () {
		$("#panel4").toggle();
	});
});

$(document).ready(function () {
	$("#flip5").click(function () {
		$("#panel5").toggle();
	});
});

$(document).ready(function () {
	$("#flip6").click(function () {
		$("#panel6").toggle();
	});
});

$(document).ready(function () {
	$("#flip7").click(function () {
		$("#panel7").toggle();
	});
});

$(document).ready(function () {
	$("#flip8").click(function () {
		$("#panel8").toggle();
	});
});

function SearchE() {
	var fname = document.getElementById("Search").value;
	if ((fname == null) || (fname == " ") || (fname == '')) {
		event.preventDefault();
	}
}

function validateEmailSub() {
	var email = document.getElementById("emailSuB").value;
	var at = email.indexOf("@");
	var dt = email.lastIndexOf(".");
	var lengthEmial = email.length;

	if ((at < 2) || (dt - at < 2) || (lengthEmial - dt < 2)) {
		alert("Please enter a valid Email Address!");
		event.preventDefault();
	}
}

function validateEmailContact() {
	var email = document.getElementById("txtEmail").value;
	var at = email.indexOf("@");
	var dt = email.lastIndexOf(".");
	var lengthEmial = email.length;

	if ((at < 2) || (dt - at < 2) || (lengthEmial - dt < 2)) {
		alert("Please enter a valid Email Address!");
		event.preventDefault();
	}

	var Mesa = document.getElementById("txtMessage").value;
	if ((Mesa == null) || (Mesa == " ") || (Mesa == '')) {
		alert("You can't keep the Message Empty!");
		event.preventDefault();
	}
}

