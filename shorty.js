(function(){
  var ajaxObj = new XMLHttpRequest();

  ajaxObj.open("GET","http://localhost/shorty/ear/?url="+window.location.href);
  ajaxObj.send();
  ajaxObj.onreadystatechange = function(){
    console.log(this.status, this.readyState);
    console.log(this.readyState == 4 && this.status === 200);
    if(this.readyState === 4 && this.status == 200){
      alert(this.responseText);
      alert("Well this was somethign added");

      var box = "<div class=''>";
      box    += "Link inserted.";
      box    += "</div>";
      
    }
  }
})()