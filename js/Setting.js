function checkPassword()
{
	var v1 =  document.getElementById("pwd2").value;
	var v2 =  document.getElementById("pwd3").value;

	if(v1 != v2)
	{
		alert("Password Mismatch!");
	}
	else
	{
		alert("Success");
	}
}