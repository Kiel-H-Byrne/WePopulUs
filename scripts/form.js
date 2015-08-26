
function validateZIP(field) {
var valid = "0123456789-";
var hyphencount = 0;

if (field.length!=5 && field.length!=10) {
alert("Please enter your 5 or 9 digit zip code.");
return false;
}
for (var i=0; i < field.length; i++) {
temp = "" + field.substring(i, i+1);
if (temp == "-") hyphencount++;
if (valid.indexOf(temp) == "-1") {
alert("Invalid characters in your zip code.  Please try again.");
return false;
}
if ((hyphencount > 1) || ((field.length==10) && ""+field.charAt(5)!="-")) {
alert("The hyphen character should be used with a properly formatted 5 digit+four zip code, like '12345-6789'.   Please try again.");
return false;
   }
}
return true;
}

//spendingform
function checkform ( form )
{

  filter = form.fy.options[form.fy.selectedIndex].value;

    
  loc = form.location.options[form.location.selectedIndex].value;

 

  if (loc =='zipcode')
  {
  	var el = document.createElement("input");
   	el.type = "hidden";
   	el.name = "search_type";
   	el.value = "zipcode";
   	form.appendChild(el);
   	
   	var el2 = document.createElement("input");
   	el2.type = "hidden";
   	el2.name = "search_location";
   	el2.value = form.zipcode.value;
   	form.appendChild(el2);
  }
  else
  {
  	if (loc == 'state')
  	{
  	  	var el = document.createElement("input");
   		el.type = "hidden";
   		el.name = "search_type";
   		el.value = "state";
   		form.appendChild(el);
   	
   		var el2 = document.createElement("input");
   		el2.type = "hidden";
   		el2.name = "search_location";
   		el2.value = form.state.value;
   		form.appendChild(el2);
  	
  	}
  	else
  	{
  		if ((filter == "2000") || (filter == "2001") || (filter == "2002") || (filter == "2003"))
  		{
   			document.getElementById('error_alert').innerHTML = 'FY must be 2004 or later when searching by District';
    		return false ;
  		}
  		
  		var el = document.createElement("input");
   		el.type = "hidden";
   		el.name = "search_type";
   		el.value = "district";
   		form.appendChild(el);
   	
   		var el2 = document.createElement("input");
   		el2.type = "hidden";
   		el2.name = "search_location";
   		el2.value = loc;
   		form.appendChild(el2);	
  		
  	}
  }

  return true ;
}