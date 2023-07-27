function checkPassword()
{
	var v1 =  document.getElementById("pwd1").value;
	var v2 =  document.getElementById("pwd2").value;
	
	if(v1 != v2)
	{
		alert("Password Mismatch!");
		return false;
	}

	return true;
}