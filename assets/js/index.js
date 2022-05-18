function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("show").style.display = "inline-block";
    document.getElementById("hide").style.display = "none";
  } else {
    x.type = "password";
    document.getElementById("show").style.display = "none";
    document.getElementById("hide").style.display = "inline-block";
  }
}

var Form1 = document.getElementById("Form1");
var Form2 = document.getElementById("Form2");
var Form3 = document.getElementById("Form3");

var Next1 = document.getElementById("Next1");
var Next2 = document.getElementById("Next2");
var Previous1 = document.getElementById("Previous1");
var Previous2 = document.getElementById("Previous2");

var progress = document.getElementById("progress");

Next1.onclick = function () {
  Form1.style.left = "-600px";
  Form2.style.left = "70px";
  progress.style.width = "370px";
};

Previous1.onclick = function () {
  Form1.style.left = "35px";
  Form2.style.left = "600px";
  progress.style.width = "185px";
};

Next2.onclick = function () {
  Form2.style.left = "-600px";
  Form3.style.left = "25px";
  progress.style.width = "554px";
};

Previous2.onclick = function () {
  Form2.style.left = "70px";
  Form3.style.left = "600px";
  progress.style.width = "368px";
}

