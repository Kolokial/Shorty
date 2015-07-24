(function(){
  var ajaxObj = new XMLHttpRequest();

  ajaxObj.open("GET","http://localhost/shorty/ear/?url="+window.location.locationbar);
  ajaxObj.send();
  ajaxObj.onreadystatechange = function(){
    if(ajaxObj.readyState === 4 && ajaxObj.status === 200)
    alert(ajaxObj.responseText);
    alert('Well this was somethign added');
  }
})()