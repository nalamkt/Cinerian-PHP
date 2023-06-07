
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
    var w = document.getElementById("filtf");
    x.style.display = "none";
    z.style.display = "none";
    y.style.display = "none";
    w.style.display = "none";
    document.getElementById("seguidores").style.display = "none";
    document.body.style.overflow = 'scroll';
}
function showFollowers(){
    document.getElementById("seguidores").style.display = "block";
    document.getElementById("black").style.display = "block";
    document.body.style.overflow = 'hidden';
}
function showFilter(){
    document.getElementById("filtf").style.display = "block";
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
function showSearcher(){
    var mainMenu = document.getElementsByClassName("mainMenu")[0];
    var header2 = document.getElementsByClassName("header2")[0];
    var buscador = document.getElementsByClassName("buscador")[0];
    mainMenu.style.display = 'none';
    header2.style.display = 'block';
    buscador.style.display = 'block';
}
function hideSearch(){
    var mainMenu = document.getElementsByClassName("mainMenu")[0];
    var header2 = document.getElementsByClassName("header2")[0];
    var buscador = document.getElementsByClassName("buscador")[0];
    mainMenu.style.display = 'block';
    header2.style.display = 'none';
    buscador.style.display = 'none';
}


function review(){
    var rev = document.getElementsByClassName("review")[0];
    var z = document.getElementById("black");
    rev.style.display = 'block';
    z.style.display = 'block';
}
function revClos(){
    var rev = document.getElementsByClassName("review")[0];
    var z = document.getElementById("black");
    rev.style.display = 'none';
    z.style.display = 'none';
}

function closeAll(){
    var y = document.getElementById("toggle");
    var z = document.getElementById("black");
    var filtf = document.getElementById("filtf");
    filtf.style.display = "none";
    document.body.style.overflow = 'scroll';
    var h = document.getElementById("seguidores");
    z.style.display = "none";
    y.style.display = "none";
    h.style.display = "none";
}



function showSearcher(){
    var mainMenu = document.getElementsByClassName("mainMenu")[0];
    var header2 = document.getElementsByClassName("header2")[0];
    var buscador = document.getElementsByClassName("buscador")[0];
    var notification = document.getElementsByClassName("notification")[0];
    mainMenu.style.display = 'none';
    header2.style.display = 'block';
    buscador.style.display = 'block';
    notification.style.display = 'none';
}
function hideSearch(){
    var mainMenu = document.getElementsByClassName("mainMenu")[0];
    var header2 = document.getElementsByClassName("header2")[0];
    var buscador = document.getElementsByClassName("buscador")[0];
    var notification = document.getElementsByClassName("notification")[0];
    mainMenu.style.display = 'block';
    header2.style.display = 'none';
    buscador.style.display = 'none';
    notification.style.display = 'none';
}
function hideFilt(){
    var z = document.getElementById("black");
    z.style.display = "none";
    var filtf = document.getElementById("filtf");
    filtf.style.display = "none";
    document.body.style.overflowY = 'scroll'; // desplazamiento vertical siempre visible
}
function showNot(){
    var mainMenu = document.getElementsByClassName("mainMenu")[0];
    var header2 = document.getElementsByClassName("header2")[0];
    var notification = document.getElementsByClassName("notification")[0];
    var buscador = document.getElementsByClassName("buscador")[0];
    mainMenu.style.display = 'none';
    header2.style.display = 'block';
    notification.style.display = 'block';
    buscador.style.display = 'none';
}
function hideNot(){
    var mainMenu = document.getElementsByClassName("mainMenu")[0];
    var header2 = document.getElementsByClassName("header2")[0];
    var notification = document.getElementsByClassName("notification")[0];
    mainMenu.style.display = 'block';
    header2.style.display = 'none';
    notification.style.display = 'none';
}
function ytMode(){
    var img = document.getElementById("initial");
    var vid = document.getElementById("stgVid");
    var main = document.getElementsByClassName("mainStage")[0];
    var second = document.getElementsByClassName("mainStage")[1];
    var card = document.getElementsByClassName("card")[0];
    var watch = document.getElementsByClassName("watch")[0];
    const elementos = document.querySelectorAll('.avcon-in');
    elementos.forEach(elemento => {
      elemento.style.width = '100%';
    });
    img.style.display = 'none';
    vid.style.display = 'block';
    main.style.width = '100%';
    second.style.width = '80%';
    card.style.width = '90%';
    watch.style.width = '10%';
    card.style.float = 'left';
    watch.style.float = 'left';
    watch.style.position = 'fixed';
    watch.style.top = '150px';
}
function getComments(){
    const main = document.getElementById("mainCom");
    const second = document.getElementById("secCom");
    main.style.display = 'block';
    second.style.display = 'none';
}
function hideCom(){
    const main = document.getElementById("mainCom");
    const second = document.getElementById("secCom");
    main.style.display = 'none';
    second.style.display = 'block';
}












