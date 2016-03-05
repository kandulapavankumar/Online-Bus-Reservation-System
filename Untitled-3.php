function doFormSubmit()
{
if(document.f.acc.value !='')
{
var theurl=document.f.acc.value;
var numericExpression = /^[0-9]+$/;
if(numericExpression.test(theurl))
{
return true;
}
alert("Enter no only");
document.getElementById('acc').focus();
return false;
}


if(document.f.card.value !='')
{
var card = document.f.card.value;
var length = card.length;
var theurl=document.f.card.value;
var numericExpression = /^[0-9]+$/;
if(numericExpression.test(theurl))
{

if(length ==16 )
{
return true;
}
else
{
alert("Card number should be of 16 Digits");
f.card.focus();
return false;
}

return true;
}
else
{
alert("Card number should be Numeric");
f.card.focus();
return false;
}
}


if(document.f.crdname.value =='')
{
alert("Card holder's Name can not be blank,please fill it");
ddocument.getElementyId('crdname').focus();
return false;
}
else
{
return true;
}
}
}
