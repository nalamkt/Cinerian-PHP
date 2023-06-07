
function toggle() {
  var x = document.getElementById("toggle");
  var z = document.getElementById("black");
  if (x.style.display === "none") {
    x.style.display = "block";
    z.style.display = "block";
    document.body.style.overflow = 'hidden';
  } else {
    x.style.display = "none";
    z.style.display = "none";
    document.body.style.overflow = 'scroll';
  }
}
function noti() {
  var x = document.getElementById("noti");
  var z = document.getElementById("black");
  if (x.style.display === "none") {
    x.style.display = "block";
    z.style.display = "block";
    document.body.style.overflow = 'hidden';
  } else {
    x.style.display = "none";
    z.style.display = "none";
    document.body.style.overflow = 'scroll';
  }
}
function closeAll(){
    var x = document.getElementById("noti");
    var y = document.getElementById("toggle");
    var z = document.getElementById("black");
    x.style.display = "none";
    z.style.display = "none";
    y.style.display = "none";
    document.getElementById("seguidores").style.display = "none";
    document.getElementById("seguidos").style.display = "none";
    document.body.style.overflow = 'scroll';
}
function showFollowers(){
    document.getElementById("seguidores").style.display = "block";
    document.getElementById("black").style.display = "block";
    document.body.style.overflow = 'hidden';
}

function showFollowers2(){
    document.getElementById("seguidos").style.display = "block";
    document.getElementById("black").style.display = "block";
    document.body.style.overflow = 'hidden';
}
function seeAll() {
    var x = document.getElementsByClassName("recomendacion");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = 'block';
    }
    var z = document.getElementsByClassName("solicitud");
    var h;
    for (h = 0; h < x.length; h++) {
        z[h].style.display = 'block';
    }
}
function seeRec() {
    var x = document.getElementsByClassName("recomendacion");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = 'block';
    }
    var z = document.getElementsByClassName("solicitud");
    var h;
    for (h = 0; h < x.length; h++) {
        z[h].style.display = 'none';
    }
}
function seeSol() {
    var x = document.getElementsByClassName("recomendacion");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = 'none';
    }
    var z = document.getElementsByClassName("solicitud");
    var h;
    for (h = 0; h < x.length; h++) {
        z[h].style.display = 'block';
    }
}
