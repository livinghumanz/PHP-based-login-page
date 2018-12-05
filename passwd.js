function validate() {
  var pw1 = document.getElementById("pwd1");
  var pw2 = document.getElementById("pwd2");
  var name = document.getElementById("nme");
  var pno =document.getElementById("pno");
  /*var para=document.createElement('p');
  var cardright=document.getElementById("cardright");
  var br1=document.getElementById("br1");
  var node;*/
  if (name.value == "")
    alert("enter your name first");

  if (pw1.value == "") {
    /* node=document.createTextNode("empty password entered ");
     para.appendChild(node);
     cardright.insertBefore(para,br1);*/
    document.getElementById("p1").style.color = "red";
    document.getElementById("p1").innerHTML = " &#9888 password not entered";
  } else if (pw1.value != pw2.value) {
    document.getElementById("p1").style.color = "red";
    document.getElementById("p1").innerHTML = " &#9746 password doesnot match"
  } else if (pw1.value == pw2.value) {
    document.getElementById("p1").style.fontWeight = "bold";
    document.getElementById("p1").style.color = "green";
    document.getElementById("p1").innerHTML = "  password match done &#9745";
  }
}
function loadfun(){
  var myVar = setTimeout(function(){
    document.getElementById("loader").style.display = "none";
    document.getElementById("cont").style.display ="block";  
  }, 2000);
}
function validate1()
{
  var pno =document.getElementById("pno");
  var n = pno.value.length;
  if (pno.value=='9876543210'||pno.value=='1234567890') 
  {
    alert("wrong phone number :");
    pno.focus;    
  }
  else if (isNaN(pno.value)) 
  {
    alert("enter a valid phone number");    
  }
  else if (n != 10) 
  {
    alert("check your number length");  
  } 
  /*else if(n==10)
  {
    alert("number is ok ");
  }*/
    validate();
}