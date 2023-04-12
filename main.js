function login() {
	var form1 = document.getElementsByClassName("login-body-1");
	var form2 = document.getElementsByClassName("login-body-2");
	var form3 = document.getElementsByClassName("login-body-3");
	var top1 = document.getElementById("user-login");
	var top2 = document.getElementById("admin-login");

	form1[0].style = "display: block;";
	form2[0].style = "display: none;";
	form3[0].style = "display: none;";
	top1.style = "background-color: #000 !important;";
	top2.style = "background-color: transparent !important;";
}

function reg() {
	var form1 = document.getElementsByClassName("login-body-1");
	var form2 = document.getElementsByClassName("login-body-2");
	var form3 = document.getElementsByClassName("login-body-3");

	form1[0].style = "display: none;";
	form2[0].style = "display: block;";
	form3[0].style = "display: none;";
}

function admin() {
	var form1 = document.getElementsByClassName("login-body-1");
	var form2 = document.getElementsByClassName("login-body-2");
	var form3 = document.getElementsByClassName("login-body-3");
	var top1 = document.getElementById("user-login");
	var top2 = document.getElementById("admin-login");

	form1[0].style = "display: none;";
	form2[0].style = "display: none;";
	form3[0].style = "display: block;";
	top1.style = "background-color: transparent !important;";
	top2.style = "background-color: #000 !important;";
}