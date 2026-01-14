// Linking index.js:
function contact()
{
  with(document.contactform)
  {
    if(fname.value.length==0)
    {
      fname.placeholder="The given field is empty";
      event.preventDefault();
    }
    if(lname.value.length==0)
    {
      lname.placeholder="The given field is empty";
      event.preventDefault();
    }
    if(email.value.length==0)
    {
      email.placeholder="The given field is empty";
      event.preventDefault();
    }
    if(phone.value.length==0)
    {
      phone.placeholder="The given field is empty";
      event.preventDefault();
    }
    if(message.value.length==0)
    {
      message.placeholder="The given field is empty";
      event.preventDefault();
    }
  }
}

// document.addEventListener("contextmenu",function(){
//   event.preventDefault();
// });
