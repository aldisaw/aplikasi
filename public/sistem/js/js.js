  var arr=0;
  var req55=new Array();
  var amountLoaded = 0;
  //progressBarSim(amountLoaded);
  function progressBarSim(al) {
    var finalMessage = document.getElementById('finalMessage');
    var bar = document.getElementById('progressBar');
    var status = document.getElementById('status');
    finalMessage.innerHTML = "";
    status.innerHTML = al+"%";
    bar.value = al;
    al++;
    var sim = setTimeout("progressBarSim("+al+")",xmlhttp.readyState);
    if(al == 100){
      status.innerHTML = "100%";
      bar.value = 100;
      clearTimeout(sim);
      
      finalMessage.innerHTML = "Transaksi complete";
    }
  }
  function load_data(f,t,l){
  arr++;
  if (window.XMLHttpRequest){
     req55[arr]=new XMLHttpRequest();}
  else{
     req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");}
  req55[arr].onreadystatechange=function(){
  if (req55[arr].readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";}
    else{
        document.getElementById(l).innerHTML = "Loading..";}
  }
  else if (req55[arr].readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req55[arr].responseText;
        
        }
    else{
        
        document.getElementById(l).innerHTML = req55[arr].responseText;
        
        }
//load_data1('fungsi/js.php?ua=../module/manajemen_pembayaran_piutang/input.php&kategori=cari_treatment_paket&kode='+no_pembelian.value','i','detil_cari_treatment');
  }
  else{}}
  req55[arr].open("GET",f,true);
  req55[arr].send();}
  function menu(f,t,l){
    arr++;
    if (window.XMLHttpRequest){
       req55[arr]=new XMLHttpRequest();}
    else{
       req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");}
    req55[arr].onreadystatechange=function(){
    if (req55[arr].readyState==1){
      
      if(t=="v"){
          document.getElementById(l).value = "Loading..";}
      else{
          document.getElementById(l).innerHTML = "Loading..";}
    }
    else if (req55[arr].readyState==4){
      loadScript('js/menu.js', function(){});
      if(t=="v"){
          document.getElementById(l).value = req55[arr].responseText;
          
          }
      else{
          
          document.getElementById(l).innerHTML = req55[arr].responseText;
          
          }
    }
    else{}}
    req55[arr].open("GET",f,true);
    req55[arr].send();
  }

   function ambildata(f,t,l){
    arr++;
    var target=f;
    if (window.XMLHttpRequest){
       req55[arr]=new XMLHttpRequest();}
    else{
        req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");}
        req55[arr].onreadystatechange=function(){
        if (req55[arr].readyState==4){
          if(t=="v"){
              document.getElementById(l).value = req55[arr].responseText;
              
              }
          else{
              
              document.getElementById(l).innerHTML = req55[arr].responseText;
              
              }
        }
    else{}}
    req55[arr].open("GET",target,true);
    req55[arr].send();}


  function load_data_value(f,t,l){
  arr++;
  if (window.XMLHttpRequest){
     req55[arr]=new XMLHttpRequest();}
  else{
     req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");}
  req55[arr].onreadystatechange=function(){
  if (req55[arr].readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";}
    else{
        document.getElementById(l).innerHTML = "Loading..";}
  }
  else if (req55[arr].readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req55[arr].responseText;
        }
    else{
        document.getElementById(l).innerHTML = req55[arr].responseText;
        }
//load_data1('fungsi/js.php?ua=../module/manajemen_pembayaran_piutang/input.php&kategori=cari_treatment_paket&kode='+no_pembelian.value','i','detil_cari_treatment');
  }
  else{}}
  req55[arr].open("GET",f,true);
  req55[arr].send();}

  function load_data1(f,t,l){
  var lokasi=l.split(",");
  
  arr++;
  if (window.XMLHttpRequest){
     req55[arr]=new XMLHttpRequest();}
  else{
     req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");}
  req55[arr].onreadystatechange=function(){
  if (req55[arr].readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";}
    else{
        document.getElementById(l).innerHTML = "Loading..";}
  }
  else if (req55[arr].readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req55[arr].responseText;
        
        }
    else{
        loadScript('js/ref.js', function(){});
        var respom=req55[arr].responseText.split("<>");
        for (var i=0;i<lokasi.length;i++){
          document.getElementById(lokasi[i]).innerHTML = respom[i];
        }    
    }

  }
  else{}}
  req55[arr].open("GET",f,true);
  req55[arr].send();}

   function load_dataf(f,t,l){
  arr++;
  if (window.XMLHttpRequest){
     req55[arr]=new XMLHttpRequest();}
  else{
     req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");}
  req55[arr].onreadystatechange=function(){
  if (req55[arr].readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";}
    else{
        document.getElementById(l).innerHTML = "Loading..";}
  }
  else if (req55[arr].readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req55[arr].responseText;
        loadScript('js/refres.js', function(){});
        }
    else{
        document.getElementById(l).innerHTML = req55[arr].responseText;
        loadScript('js/refres.js', function(){});
        }
//load_data1('fungsi/js.php?ua=../module/manajemen_pembayaran_piutang/input.php&kategori=cari_treatment_paket&kode='+no_pembelian.value','i','detil_cari_treatment');
  }
  else{}}
  req55[arr].open("GET",f,true);
  req55[arr].send();}

  
  function simpandataklik(f,t,l,frm) {
      
      var get=f;
      var message = "";
      var jumlah =0;
      for (i = 0; i < frm.treatmen.length; i++)
      if (frm.treatmen[i].checked){
         message = message +"&treatmen"+i+"="+frm.treatmen[i].value
         jumlah++;
      }

      //alert(get+"&jumlah="+jumlah+message);

      var url=get+"&jumlah="+jumlah+message;

      arr++;
      if (window.XMLHttpRequest){
          req55[arr]=new XMLHttpRequest();
      }
      else{
          req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");
      }
          req55[arr].onreadystatechange=function(){

          if (req55[arr].readyState==1){
              if(t=="v"){
                  document.getElementById(l).value = "Loading..";}
              else{
                  document.getElementById(l).innerHTML = "Loading..";}
              }
          else if (req55[arr].readyState==4){
              if(t=="v"){
                  document.getElementById(l).value = req55[arr].responseText;
                  loadScript('js/refres.js', function(){});
              }
              else{
                  document.getElementById(l).innerHTML = req55[arr].responseText;
                  //notiftransaksi(req55[arr].responseText);
              }

          }
          else{}
          }
        
        
        req55[arr].open("GET",url,true);
        req55[arr].send();
      //}
  }
  function hapusdata(f,t,l){
    arr++;
      if (window.XMLHttpRequest){
          req55[arr]=new XMLHttpRequest();}
      else{
          req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");}
          req55[arr].onreadystatechange=function(){
          if (req55[arr].readyState==1){
              if(t=="v"){
                  document.getElementById(l).value = "Loading..";}
              else{
                  document.getElementById(l).innerHTML = "Loading..";}
              }
          else if (req55[arr].readyState==4){
              if(t=="v"){
                  document.getElementById(l).value = req55[arr].responseText;
                  loadScript('js/refres.js', function(){});
              }
              else{
                  document.getElementById(l).innerHTML = req55[arr].responseText;
                  loadScript('js/refres.js', function(){});
                  
          }

          }
          else{}
          }
        req55[arr].open("GET",f,true);
        req55[arr].send();

  }
  

function view(e,lk,i,l){
 var input =i;
 var lebar=l;
 var lks=lk;
 var fr=new FileReader();
 fr.onload=function(e){
   var img=new Image();
   img.onload=function(){
   var MAXWidthHeight=l;
   var r=MAXWidthHeight/Math.max(this.width,this.height),
   w=Math.round(this.width*r),
   h=Math.round(this.height*r),
   c=document.createElement("canvas");
   c.width=w;c.height=h;
   c.getContext("2d").drawImage(this,0,0,w,h);
   var url=c.toDataURL();
   document.getElementById(lks).src=url;
   document.getElementById(input).value=url;
  }
  img.src=e.target.result;
 }
 fr.readAsDataURL(e.target.files[0]);
}

function arr_load(f,l,t,d){
if(err==""){
  if (window.XMLHttpRequest){
     req51=new XMLHttpRequest();}
  else{
     req51=new ActiveXObject("Microsoft.XMLHTTP");}
  req51.onreadystatechange=function(){
  if (req51.readyState==1){
        document.getElementById("loading").style.display = "inline";
  }
  else if (req51.readyState==4){
    var lokasi=l.split(",");
    var respon=req51.responseText.split("<####>");
      for (var i=0;i<lokasi.length;i++){
        if (lokasi[i].substr(0,1)=="@") {
          document.getElementById(lokasi[i].replace("@","")).innerHTML = respon[i];
        }
        else{
          document.getElementById(lokasi[i]).value = respon[i];
        }
      }
      window.history.pushState("object or string", "Title", "?"+t);
      document.getElementById("loading").style.display = "none";
  }
  else{}}
  req51.open("POST","data.php?acc_con=js_acc&"+f,true);
  req51.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  req51.setRequestHeader("Content-length", d.length);
  req51.setRequestHeader("Connection", "close");
  req51.send(d);
}
else{
  err="";
}
}

function ambil_nilai(form){
  var jumlah=document.getElementById(form).length;
  var url="";
  for (i=0;i<jumlah;i++){
      if(document.getElementById(form)[i].name.substr(0,1)=="#" && document.getElementById(form)[i].value==""){
      document.getElementById(form)[i].style.background="#FFC0C0";
          if(document.getElementById(form)[i].type=="radio" || document.getElementById(form)[i].type=="checkbox")
              {
                   if(document.getElementById(form)[i].checked==true){
                   url +='&'+document.getElementById(form)[i].name+'='+document.getElementById(form)[i].value;
                   }
              }
              else{
                   url +='&'+document.getElementById(form)[i].name.replace("#","")+'='+document.getElementById(form)[i].value;
                   err+="1";
                   
              }
      }
      else{
          if(document.getElementById(form)[i].type=="radio" || document.getElementById(form)[i].type=="checkbox")
              {
                   if(document.getElementById(form)[i].checked==true){
                   url +='&'+document.getElementById(form)[i].name+'='+document.getElementById(form)[i].value;
                   }
              }
              else{
                   document.getElementById(form)[i].style.background="";
                   url +='&'+document.getElementById(form)[i].name.replace("#","")+'='+document.getElementById(form)[i].value;
              }
      }
  }
return url
}



var peta;
var pertama = 0;
var jenis = "sto";
var nama = new Array();
var kode = new Array();
var alamat = new Array();
var no_telfon =new Array();
var email = new Array();
var nama_kepala = new Array();
var gambar = new Array();
var i;
var url;
var gambar_tanda;
function peta_awal(){
    var bogor = new google.maps.LatLng(0.2746571512146894,101.70318603515625);
    var petaoption = {
        zoom: 6,
        center: bogor,
        mapTypeId: google.maps.MapTypeId.SATELLITE
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        kasihtanda(event.latLng);
    });
    ambildatabase('awal');
}

function kasihtanda(lokasi){
    set_icon(jenis);
    tanda = new google.maps.Marker({
            position: lokasi,
            map: peta,
            icon: gambar_tanda
    });
    $("#x").val(lokasi.lat());
    $("#y").val(lokasi.lng());

}

function set_icon(jenisnya){
    switch(jenisnya){
        case "sto":
            gambar_tanda = 'icon/home.png';
            break;
        case "airport":
            gambar_tanda = 'icon/airport.png';
            break;
        case  "masjid":
            gambar_tanda = 'icon/mosque.png';
            break;
    }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "file/data.php?akhir=1";
    }else{
        url = "file/data.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                nama[i] = msg.wilayah.petak[i].nama;
                kode[i] = msg.wilayah.petak[i].kode;
                alamat[i] = msg.wilayah.petak[i].alamat;
                no_telfon[i] = msg.wilayah.petak[i].no_telfon;
                email[i] = msg.wilayah.petak[i].email;
                nama_kepala[i] = msg.wilayah.petak[i].nama_kepala;
                gambar[i] = msg.wilayah.petak[i].gambar;

                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: 'icon/home.png'
                });
                setinfo(tanda,i);

            }
        }
    });
}

function setjenis(jns){
    jenis = jns;
}

function setinfo(petak, nomor){
        google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo").fadeIn();
        $("#teksnama").html(nama[nomor]);
        $("#teksalamat").html(alamat[nomor]);
        $("#tekskode").html(kode[nomor]);
        $("#no_telfon").html(no_telfon[nomor]);
        $("#email").html(email[nomor]);
        $("#nama_kepala").html(nama_kepala[nomor]);
        $("#gambar").html(gambar[nomor]);
    });
}
function jumlah(angka1,angka2,hasil){
  var a =angka1;
  var b =angka2;
  var c=a+b;
  document.getElementById(hasil).value=c;
}
function terbilang1(jumlah,a){
    var bilangan=jumlah;
    var kalimat="";
    var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
    var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
    var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');
    var panjang_bilangan = bilangan.length;
     
    /* pengujian panjang bilangan */
    if(panjang_bilangan > 15){
        kalimat = "Diluar Batas";
    }else{
        /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
        for(i = 1; i <= panjang_bilangan; i++) {
            angka[i] = bilangan.substr(-(i),1);
        }
         
        var i = 1;
        var j = 0;
         
        /* mulai proses iterasi terhadap array angka */
        while(i <= panjang_bilangan){
            subkalimat = "";
            kata1 = "";
            kata2 = "";
            kata3 = "";
             
            /* untuk Ratusan */
            if(angka[i+2] != "0"){
                if(angka[i+2] == "1"){
                    kata1 = "Seratus";
                }else{
                    kata1 = kata[angka[i+2]] + " Ratus";
                }
            }
             
            /* untuk Puluhan atau Belasan */
            if(angka[i+1] != "0"){
                if(angka[i+1] == "1"){
                    if(angka[i] == "0"){
                        kata2 = "Sepuluh";
                    }else if(angka[i] == "1"){
                        kata2 = "Sebelas";
                    }else{
                        kata2 = kata[angka[i]] + " Belas";
                    }
                }else{
                    kata2 = kata[angka[i+1]] + " Puluh";
                }
            }
             
            /* untuk Satuan */
            if (angka[i] != "0"){
                if (angka[i+1] != "1"){
                    kata3 = kata[angka[i]];
                }
            }
             
            /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
            if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")){
                subkalimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
            }
             
            /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
            kalimat = subkalimat + kalimat;
            i = i + 3;
            j = j + 1;
        }
         
        /* mengganti Satu Ribu jadi Seribu jika diperlukan */
        if ((angka[5] == "0") && (angka[6] == "0")){
            kalimat = kalimat.replace("Satu Ribu","Seribu");
        }
    }
    document.getElementById(a).value=kalimat;
}

  var err="";
  var err_des="";
  var mn="";
  var sbmn="";
  var folder="fitri";

  function cari(f, judul){
  var jdl=judul.replace(/%/g," ");
  //alert(judul);
  document.getElementById("js").innerHTML="<div id='kotak-dialog'><h3 class='title'><div id='judul'>"+jdl+"</div><b onclick=kosong(); class='close' title='Keluar'><div id='keluar'></div></b></h3><div id='isi_dialog'></div></div><div id='dialog_overlay' onclick=kosong();></div>";
  dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.8;background-color:rgb(135, 22, 160)display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  document.body.style.overflow="hidden";

  if (window.XMLHttpRequest){
     req=new XMLHttpRequest();}
  else{
     req=new ActiveXObject("Microsoft.XMLHTTP");}
  req.onreadystatechange=function(){
  if (req.readyState==1){
    document.getElementById("isi_dialog").innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";
    //window.reload(true);
    }
  else if (req.readyState==4){
    document.getElementById("isi_dialog").innerHTML = req.responseText;}
    //$('embed, object, iframe').css({ 'visibility' : 'visible' });
  else{}}
  req.open("GET",f,true);
  req.send();

  }
  function caria(f, judul){
  var jdl=judul.replace(/%/g," ");
  //alert(judul);
  document.getElementById("js").innerHTML="<div id='kotak-dialoga'><h3 class='title'>"+jdl+"<b onclick=kosong(); class='close'><div id='keluara'><img src='images/k.png'></div></b></h3><div id='isi_dialoga'></div></div><div id='dialog_overlay' onclick=kosong();></div>";
  dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.8;background-color:rgb(135, 22, 160);display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  document.body.style.overflow="hidden";

  if (window.XMLHttpRequest){
     req=new XMLHttpRequest();}
  else{
     req=new ActiveXObject("Microsoft.XMLHTTP");}
  req.onreadystatechange=function(){
  if (req.readyState==1){
    document.getElementById("isi_dialoga").innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";
    //window.reload(true);
    }
  else if (req.readyState==4){
    document.getElementById("isi_dialoga").innerHTML = req.responseText;}
    //$('embed, object, iframe').css({ 'visibility' : 'visible' });
  else{}}
  req.open("GET",f,true);
  req.send();

  }
  function secrh(f, judul){
  var jdl=judul.replace(/%/g," ");
  //alert(judul);
  var target="fungsi/js.php?ua=js_fungsi.php&"+f;
  document.getElementById("js").innerHTML="<div id='kotak-dialoga'><h3 class='title'><font size=5 color=#BB7070><strong>"+jdl+"</strong></form><b onclick=kosong(); class='close'><div id='keluara'><img src='images/k.png'></div></b></h3><div id='isi_dialoga'></div></div><div id='dialog_overlay' onclick=kosong();></div>";
  dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.8;background-color:rgb(135, 22, 160);display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  document.body.style.overflow="hidden";

  if (window.XMLHttpRequest){
     req=new XMLHttpRequest();}
  else{
     req=new ActiveXObject("Microsoft.XMLHTTP");}
  req.onreadystatechange=function(){
  if (req.readyState==1){
    document.getElementById("isi_dialoga").innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";
    //window.reload(true);
    }
  else if (req.readyState==4){
    document.getElementById("isi_dialoga").innerHTML = req.responseText;}
    //$('embed, object, iframe').css({ 'visibility' : 'visible' });
  else{}}
  req.open("GET",target,true);
  req.send();

  }
  function secrhm(f, judul){
  var jdl=judul.replace(/%/g," ");
  //alert(judul);
  var target="fungsi/js.php?ua=js_fungsi.php&"+f;
  document.getElementById("jsa").innerHTML="<div id='kotak-dialoga'><h3 class='title'><font size=5 color=#BB7070><strong>"+jdl+"</strong></form><b onclick=kosongad(); class='close'><div id='keluara'><img src='images/k.png'></div></b></h3><div id='isi_dialoga'></div></div><div id='dialog_overlay' onclick=kosongad();></div>";
  //dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.8;background-color:rgb(135, 22, 160);display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  document.body.style.overflow="hidden";

  if (window.XMLHttpRequest){
     req=new XMLHttpRequest();}
  else{
     req=new ActiveXObject("Microsoft.XMLHTTP");}
  req.onreadystatechange=function(){
  if (req.readyState==1){
    document.getElementById("isi_dialoga").innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";
    //window.reload(true);
    }
  else if (req.readyState==4){
    document.getElementById("isi_dialoga").innerHTML = req.responseText;}
    //$('embed, object, iframe').css({ 'visibility' : 'visible' });
  else{}}
  req.open("GET",target,true);
  req.send();

  }
  function coba(){
    alert('hasil');
  }

  function cari_gambar(f, judul){
  var jdl=judul.replace(/%/g," ");
  //alert(judul);
  document.getElementById("js").innerHTML="<div id='kotak_gambar'><h3 class='title'>"+jdl+"<b onclick=kosong(); class='close'><div id='keluar'><img src='images/k.png'></div></b></h3><div id='isi_dialog_gambar'></div></div><div id='dialog_overlay' onclick=kosong();></div>";
  dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.8;background-color:#28082A;display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  document.body.style.overflow="hidden";

  if (window.XMLHttpRequest){
     req=new XMLHttpRequest();}
  else{
     req=new ActiveXObject("Microsoft.XMLHTTP");}
  req.onreadystatechange=function(){
  if (req.readyState==1){
    document.getElementById("isi_dialog_gambar").innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";
    //window.reload(true);
    }
  else if (req.readyState==4){
    document.getElementById("isi_dialog_gambar").innerHTML = req.responseText;}
    //$('embed, object, iframe').css({ 'visibility' : 'visible' });
  else{}}
  req.open("GET",f,true);
  req.send();

  }
  function cari_input(file, judul,l){
  var jdl=judul.replace(/%/g," ");

  document.getElementById(l).innerHTML="<div id='kotak-dialog'><h3 class='title'>"+jdl+"<b onclick=kosong1('"+l+"'); class='close'>&#215;</b></h3><div id='isi_dialog'></div></div>";
  if (window.XMLHttpRequest){
     req6=new XMLHttpRequest();}
  else{
     req6=new ActiveXObject("Microsoft.XMLHTTP");}
  req6.onreadystatechange=function(){
  if (req6.readyState==1){
    document.getElementById("isi_dialog").innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";}
  else if (req6.readyState==4){
    document.getElementById("isi_dialog").innerHTML = req6.responseText;}
  else{}}
  req6.open("GET",file,true);
  req6.send();}
  
  function cari_refresh(file,lokasi){
  setCookie('fi',file,365);
  setCookie('lo',lokasi,365);

  }
     function ulang(){
     var f=getCookie("fi");
     var l=getCookie("lo");
     if (window.XMLHttpRequest){
        req6=new XMLHttpRequest();}
     else{
        req6=new ActiveXObject("Microsoft.XMLHTTP");}
     req6.onreadystatechange=function(){
     if (req6.readyState==1){
        //document.getElementById(l).innerHTML = "Memuat";
     }
     else if (req6.readyState==4){
        document.getElementById(l).innerHTML = req6.responseText;}
     else{}}
     req6.open("GET",f,true);
     req6.send();
     t = setTimeout('ulang()',1000);}

     function mati(){
     clearTimeout(t);
     }
     
     function setCookie(c_name,value,exdays)
     {
     var exdate=new Date();
     exdate.setDate(exdate.getDate() + exdays);
     var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
     document.cookie=c_name + "=" + c_value;
     }
     
     function getCookie(c_name)
     {
     var i,x,y,ARRcookies=document.cookie.split(";");
     for (i=0;i<ARRcookies.length;i++)
     {
        x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
        y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
        x=x.replace(/^\s+|\s+$/g,"");
        if (x==c_name)
        {
        return unescape(y);
        }
     }
    }
  //}
  function input(file, judul){
  var jdl=judul.replace(/%/g," ");
  //var bg="dialog_overlay";

  document.getElementById("js").innerHTML="<div id='form_input'><h3 class='title'>"+jdl+"<b onclick=kosong(); class='close'>&#215;</b></h3><div id='isi_dialog_form'></div></div><div id='dialog_overlay'></div>";
  isi_dialog_form.style.cssText="margin:15px;height:500px;font:normal 12px Arial,Sans-Serif;overflow:hidden;background:#FFFFFF;opacity:1;transition: all 0.5s ease;-moz-transition: all 0.5s ease;-webkit-transition: all 0.5s ease;-o-transition: all 0.5s ease;";
  dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.8;background-color:#000000;display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  document.getElementById("isi_dialog_form").style.overflow="auto";
  document.body.style.overflow="hidden";
  if (window.XMLHttpRequest){
     req1=new XMLHttpRequest();}
  else{
     req1=new ActiveXObject("Microsoft.XMLHTTP");}
  req1.onreadystatechange=function(){
  if (req1.readyState==1){
    document.getElementById("isi_dialog_form").innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";}
  else if (req1.readyState==4){
    document.getElementById("isi_dialog_form").innerHTML = req1.responseText;}
  else{}}
  req1.open("GET",file,true);
  req1.send();}

  function konfirmasi(file, judul){
  var jdl=judul.replace(/%/g," ");

  document.getElementById("js").innerHTML="<div id='form_login_new'><h3 class='title'>"+jdl+"<b onclick=kosong(); class='close'><div id='keluar'><img src='images/k.png'></div></b></h3><div id='isi_dialog_login'></div><br><div id='ket_bawah'>ffr</div></div><div id='dialog_overlay' onclick=kosong();></div>";
  //isi_dialog_login.style.cssText="margin:15px;height:570px;font:normal 12px Arial,Sans-Serif;overflow:hidden;background:#FFFFFF;opacity:1;transition: all 0.5s ease;-moz-transition: all 0.5s ease;-webkit-transition: all 0.5s ease;-o-transition: all 0.5s ease;";
  dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.8;background-color:#000000;display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  document.body.style.overflow="hidden";
  if (window.XMLHttpRequest){
     req2=new XMLHttpRequest();}
  else{
     req2=new ActiveXObject("Microsoft.XMLHTTP");}
  req2.onreadystatechange=function(){
  if (req2.readyState==1){
    document.getElementById("isi_dialog_login").innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";}
  else if (req2.readyState==4){
    document.getElementById("isi_dialog_login").innerHTML = req2.responseText;}
  else{}}
  req2.open("GET",file,true);
  req2.send();}
  
  function konfirmasiyesno(file,l){

  document.getElementById("js").innerHTML="<div id='form_login'><h3 class='title'>Konfirmasi<b onclick=kosong(); class='close'>&#215;</b></h3><div id='isi_dialog_login'></div></div><div id='dialog_overlay' onclick=kosong();></div>";
  isi_dialog_login.style.cssText="margin:15px;height:100px;font:normal 12px Arial,Sans-Serif;overflow:hidden;background:#FFFFFF;opacity:1;transition: all 0.5s ease;-moz-transition: all 0.5s ease;-webkit-transition: all 0.5s ease;-o-transition: all 0.5s ease;";
  dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.8;background-color:#000000;display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  document.body.style.overflow="hidden";
  document.getElementById("isi_dialog_login").innerHTML="<table border=0 align=center width=100%><tr><td align=center>Apakah Anda Yakin Untuk Melanjutkan Perintah Ini.<tr><td align=center><input type=button value=Ya onclick=load_data('"+file+"','i','"+l+"');kosong(); style=padding:5px;><input type=button value=Tidak onclick=kosong(); style=padding:5px;></table>";
  }

  function UploadFile(file,f){
  var type_file=file.type;
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(e){
  if (xhr.readyState==1){
     document.getElementById("id").innerHTML = "Sedang Mengupload...";}
  else if (xhr.readyState == 4){
     document.getElementById("id").innerHTML = xhr.responseText;}}
  xhr.open("POST", f, true);
  xhr.setRequestHeader("X_FILENAME", file.name);
  xhr.send(file);}
  
  function login(f,form){
  var jumlah=document.getElementById(form).length;
  var url="";var err=""
  for (i=0;i<jumlah;i++){
      if(document.getElementById(form)[i].name.substr(0,1)=="#" && document.getElementById(form)[i].value==""){
      document.getElementById(form)[i].style.background="#FFC0C0";
          if(document.getElementById(form)[i].type=="radio" || document.getElementById(form)[i].type=="checkbox"){}else{
              url +='&'+document.getElementById(form)[i].name.replace("#","")+'='+document.getElementById(form)[i].value;
              err+="1";}
      }
      else{
          if(document.getElementById(form)[i].type=="radio" || document.getElementById(form)[i].type=="checkbox"){}else{
              document.getElementById(form)[i].style.background="";
              url +='&'+document.getElementById(form)[i].name.replace("#","")+'='+document.getElementById(form)[i].value;}
      }
  }
  ff=f+url;
  
  if(err==""){
  if (window.XMLHttpRequest){
     req3=new XMLHttpRequest();}
  else{
     req3=new ActiveXObject("Microsoft.XMLHTTP");}
  req3.onreadystatechange=function(){
  if (req3.readyState==1){
    document.getElementById("periksa").innerHTML = "<center><font color=#00FF00 size=2><b>Memeriksa Akun</b>";}
  else if (req3.readyState==4){
    var hasil = req3.responseText;
       if(hasil =="111"){
       document.getElementById("periksa").innerHTML ="<center><font color=#00FF00 size=2><b>Login Sukses..</b>";
       window.location.assign("index.php");}
       else if(hasil=="222"){
       document.getElementById("periksa").innerHTML ="<center><font color=#FF0000 size=2><b>User Tidak Di Kenal.</b>";}
       else if(hasil=="333"){
       document.getElementById("periksa").innerHTML ="<center><font color=#FF0000 size=2><b>User Dinonaktifkan Oleh Sistem.</b>";}
       else if(hasil=="444"){
       document.getElementById("periksa").innerHTML ="<center><font color=#FF0000 size=2><b>User Didelete Oleh Administrator.</b>";}
       else{
       document.getElementById("periksa").innerHTML ="<center><font color=#FF0000 size=2><b>Tidak Dapat Login. Coba Sesaat Lagi.</b>";}
    }
  else{}
  }
  req3.open("GET",ff,true);
  req3.send();
  }
  }
  
  function reload_browser(f){
  if (window.XMLHttpRequest){
     req3=new XMLHttpRequest();}
  else{
     req3=new ActiveXObject("Microsoft.XMLHTTP");}
  req3.onreadystatechange=function(){
  if (req3.readyState==1){}
  else if (req3.readyState==4){
  window.location.assign("index.php");
  }
  else{}
  }
  req3.open("GET",f,true);
  req3.send();
  }
  
  function foto(file, judul){
  var jdl=judul.replace(/%/g," ");

  document.getElementById("js").innerHTML="<div id='view_foto'><img src='images/but-left.png' class=navigator_left><img src='images/but-right.png' class=navigator_right><img src='images/close.png' class=navigator_close onclick=kosong();><div id='isi-dialog-foto'></div></div><div id='dialog_overlay' onclick=kosong();></div>";
  if (window.XMLHttpRequest){
     req1=new XMLHttpRequest();}
  else{
     req1=new ActiveXObject("Microsoft.XMLHTTP");}
  req1.onreadystatechange=function(){
  if (req1.readyState==1){
    document.getElementById("isi-dialog-foto").innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";}
  else if (req1.readyState==4){
    document.getElementById("isi-dialog-foto").innerHTML = req1.responseText;}
  else{}}
  req1.open("GET",file,true);
  req1.send();}
  
  function load_data(f,t,l){
  if (window.XMLHttpRequest){
     req55=new XMLHttpRequest();}
  else{
     req55=new ActiveXObject("Microsoft.XMLHTTP");}
  req55.onreadystatechange=function(){
  if (req55.readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";}
    else{
        document.getElementById(l).innerHTML = "<center><label>Memuat...</label><br><img src='images/loading.gif'></center>";}
  }
  else if (req55.readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req55.responseText;
        //var tinggi=document.getElementById("detail").offsetHeight + 35;
        //form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }
    else{
        document.getElementById(l).innerHTML = req55.responseText;
        //var tinggi=document.getElementById("detail").offsetHeight + 35;
        //form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }

  }
  else{}}
  req55.open("GET",f,true);
  req55.send();}


  function load_data_i(f,t,l){
  if (window.XMLHttpRequest){
     req555=new XMLHttpRequest();}
  else{
     req555=new ActiveXObject("Microsoft.XMLHTTP");}
  req555.onreadystatechange=function(){
  if (req555.readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";}
    else{
        //alert(l);
        document.getElementById(l).innerHTML = "<center><label>Memuat...</label><br><img src='images/loading.gif'></center>";
        }
  }
  else if (req555.readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req555.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }
    else{
        document.getElementById(l).innerHTML = req555.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }

  }
  else{}}
  req555.open("GET",f,true);
  req555.send();}


  function load_data_select(f,t,l){
  if (window.XMLHttpRequest){
     req66=new XMLHttpRequest();}
  else{
     req66=new ActiveXObject("Microsoft.XMLHTTP");}
  req66.onreadystatechange=function(){
  if (req66.readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";}
    else{
        document.getElementById(l).innerHTML = "<option value=''>Loading..</option>";}
  }
  else if (req66.readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req66.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }
    else{
        document.getElementById(l).innerHTML = req66.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }

  }
  else{}}
  req66.open("GET",f,true);
  req66.send();}
  
  function load_data_array(f,t,l){
  if (window.XMLHttpRequest){
     req8=new XMLHttpRequest();}
  else{
     req8=new ActiveXObject("Microsoft.XMLHTTP");}
  req8.onreadystatechange=function(){
  if (req8.readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";}
    else{
        document.getElementById(l).innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";}
  }
  else if (req8.readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req8.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }
    else{
        document.getElementById(l).innerHTML = req8.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }

  }
  else{}}
  req8.open("GET",f,true);
  req8.send();}
  
  function load_data2(f,d,t,l){
  if (window.XMLHttpRequest){
     req15=new XMLHttpRequest();}
  else{
     req15=new ActiveXObject("Microsoft.XMLHTTP");}
  req15.onreadystatechange=function(){
  if (req15.readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";}
    else{
        document.getElementById(l).innerHTML = "<center><img src='images/loading.gif'><br><label>Memuat...</label></center>";}
  }
  else if (req15.readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req15.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }
    else{
        document.getElementById(l).innerHTML = req15.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }

  }
  else{}}
  req15.open("POST",f,true);
  req15.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  req15.send(d);}
  
 
  function load_data_input(f,t,l){
  if(err==""){
  if (window.XMLHttpRequest){
     req51=new XMLHttpRequest();}
  else{
     req51=new ActiveXObject("Microsoft.XMLHTTP");}
  req51.onreadystatechange=function(){
  if (req51.readyState==1){
    if(t=="v"){
        document.getElementById(l).value = "Loading..";
        }
    else{
        document.getElementById(l).innerHTML = "Loading..";
        }
  }
  else if (req51.readyState==4){
    if(t=="v"){
        document.getElementById(l).value = req51.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }
    else{
        document.getElementById(l).innerHTML = req51.responseText;
        var tinggi=document.getElementById("detail").offsetHeight + 35;
        form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
        }

  }
  else{}}
  req51.open("GET",f,true);
  req51.send();}
  err="";
  }

  function option_value(n,ch,sx){
  var jumlah=document.getElementById(n).length;
  var dt='&'+ch+'=';
  for (i=0;i<jumlah;i++){
  if(document.getElementById(n)[i].name==ch && document.getElementById(n)[i].checked==true){
      if(document.getElementById(n)[i].type=="radio" || document.getElementById(n)[i].type=="checkbox"){
         dt +=document.getElementById(n)[i].value+sx;
      }
      else{
         dt +=document.getElementById(n)[i].value+sx;
      }
  }
  }
  return dt
  }
  
  function select_all(n,ch,t){
  if(document.getElementById(t).checked==true){
  var jumlah=document.getElementById(n).length;
  for (i=0;i<jumlah;i++){
  if(document.getElementById(n)[i].name==ch){
  document.getElementById(n)[i].checked=true;}
  }
  }
  else{
  var jumlah=document.getElementById(n).length;
  for (i=0;i<jumlah;i++){
  if(document.getElementById(n)[i].name==ch){
  document.getElementById(n)[i].checked=false;}
  }
  }
  }
  function simpandata(ev,form,element,keterangan,tujuan,hasil,kode,radio,radio2,pesan,vocer) {   
    var untuk_radio="";
    var untuk_radio2="";
    var key;
    var nilai="";
    var jlh_element=element.split(",");
    var tampung="";
    var penghubung="";
    ev = ev || event;
    key = ev.keyCode;
    if (key == 13) {

      if (radio=="g") {}
      else{

          var radios = document.getElementById(form).elements[radio];
          window.rdValue; // declares the global variable 'rdValue'
          for (var i=0; i<radios.length; i++) {
            var someRadio = radios[i];
            if (someRadio.checked) {
              rdValue = someRadio.value;
              break;
            }
            untuk_radio=radio+"=";
          }
          untuk_radio="&"+radio+"="+rdValue;
      }
      if (radio2=="g") {}
      else{
           var radiosa = document.getElementById(form).elements[radio2];
           window.rdValuea; // declares the global variable 'rdValue'
           for (var i=0; i<radiosa.length; i++) {
             var someRadioa = radiosa[i];
             if (someRadioa.checked) {
               rdValuea = someRadioa.value;
               break;
             }
             untuk_radio2=radio2+"=";
           }
          untuk_radio2="&"+radio2+"="+rdValuea;
      }
      if (vocer=="g") {
        var vocer="&vocer=tidak";
      }
      else{
        var favorite = [];
            $.each($("input[name='Vhoucer']:checked"), function(){            
                favorite.push($(this).val());
            });
            var vocer="&vocer=" + favorite.join(", ");
      }
      
      for (var i =0; i<jlh_element.length;i++) {
      var element=document.getElementById(form).elements[jlh_element[i]].value; 
      if (i==jlh_element.length-1) {
          penghubung="";
      }
      else{
          penghubung="&";
      } 
      tampung=tampung+jlh_element[i]+"="+element+penghubung;
    }
    if (window.XMLHttpRequest){
        // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
    }
    else{
        // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState<3){
          
          var amountLoaded = 0;
          //cari('fungsi/js.php?ua=../module/manajemen_transaksi/reg_transaksi.php&transksi=produk_treatment','Registrasi%Transaksi');
          progressBarSim(amountLoaded);
        }
        else if (xmlhttp.readyState==4 && xmlhttp.status==200){
          loadScript('js/ref.js', function(){});
            nilai=xmlhttp.responseText;
            var validasi=nilai.split("<>");
            if (hasil=="DF") {}
            else{
              if (validasi[1]=="sukses" || validasi[1]=="input") {document.getElementById(hasil).innerHTML=validasi[2];}
              else{}
            }
            for (var i =0; i<jlh_element.length;i++) {
                var element=document.getElementById(form).elements[jlh_element[i]].value;
                if (validasi[1]=="sukses") {document.getElementById(form).elements[jlh_element[i]].value="";}
                else{} 
                
            }
            if (kode=='ya') {
              if (validasi[1]=="sukses") {
                 document.getElementById(form).elements[jlh_element[0]].value=validasi[3];
                 document.getElementById(form).elements[jlh_element[1]].value=validasi[4];
                 document.getElementById(form).elements[jlh_element[2]].value=validasi[5];
              }
              else{}
            }
            else{}
            notiftransaksi(validasi[0],pesan);
          //kosong();
        }
      }
      
      var respon="fungsi/js.php?ua="+tujuan+".php&"+keterangan+tampung+untuk_radio+untuk_radio2+vocer;
      //alert(respon);
      xmlhttp.open("POST",respon,true);
      xmlhttp.send();
    }
  }
  function simpandata_paket(ev,form,element,keterangan,tujuan,hasil,kode,radio,radio2,radio3,cekbox,tipe) {  
    var untuk_radio="";
    var untuk_radio2="";
    var untuk_radio3="";
    var cek="";
    var key;
    var nilai="";
    var jlh_element=element.split(",");
    var tampung="";
    var penghubung="";
    ev = ev || event;
    key = ev.keyCode;
    if (key == 13) {
      if (radio=="g") {}
      else{
          var radios = document.getElementById(form).elements[radio];
          window.rdValue; // declares the global variable 'rdValue'
          for (var i=0; i<radios.length; i++) {
            var someRadio = radios[i];
            if (someRadio.checked) {
              rdValue = someRadio.value;
              break;
            }
            untuk_radio=radio+"=";
          }
          untuk_radio="&"+radio+"="+rdValue;
      }
      if (radio2=="g") {}
      else{
           var radiosa = document.getElementById(form).elements[radio2];
           window.rdValuea; // declares the global variable 'rdValue'
           for (var i=0; i<radiosa.length; i++) {
             var someRadioa = radiosa[i];
             if (someRadioa.checked) {
               rdValuea = someRadioa.value;
               break;
             }
             untuk_radio2=radio2+"=";
           }
          untuk_radio2="&"+radio2+"="+rdValuea;
      }
      if (radio3=="g") {}
      else{
           var radiosa3 = document.getElementById(form).elements[radio3];
           window.rdValuea3; // declares the global variable 'rdValue'
           for (var i=0; i<radiosa3.length; i++) {
             var someRadioa3 = radiosa3[i];
             if (someRadioa3.checked) {
               rdValuea3 = someRadioa3.value;
               break;
             }
             var untuk_radio3=radio3+"=";
           }
          var untuk_radio3="&"+radio3+"="+rdValuea3;
      }
      if (cekbox=="g") {}
      else{
            var favorite = [];
            $.each($("input[name='kas']:checked"), function(){            
                favorite.push($(this).val());
            });
            var cek="&kas=" + favorite.join(", ");
            //alert("My favourite sports are: " + favorite.join(", "));
      }

      for (var i =0; i<jlh_element.length;i++) {
      var element=document.getElementById(form).elements[jlh_element[i]].value; 
      if (i==jlh_element.length-1) {
          penghubung="";
      }
      else{
          penghubung="&";
      } 
      tampung=tampung+jlh_element[i]+"="+element+penghubung;
    }
    if (window.XMLHttpRequest){
        // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
    }
    else{
        // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            nilai=xmlhttp.responseText;
            var validasi=nilai.split("<>");
            if (hasil=="DF") {}
            else{
              if (validasi[1]=="gagal") {}
              else{
                  document.getElementById(hasil).innerHTML=validasi[5];
              }
              
            }
             
            for (var i =0; i<jlh_element.length;i++) {
              if (tipe=="card") {}
              else{
                  //var element=document.getElementById(form).elements[jlh_element[i]].value;
                  if (validasi[1]=="sukses") {document.getElementById(form).elements[jlh_element[i]].value="";}
                  else{} 
              }
                
                
            }
            if (kode=='ya') {
              if (validasi[1]=="sukses") {
                 document.getElementById(form).elements[jlh_element[0]].value=validasi[2];
                 document.getElementById(form).elements[jlh_element[1]].value=validasi[3];
                 //document.getElementById(form).elements[jlh_element[2]].value=validasi[5];
              }
              else{}
            }
            else{}
            notiftransaksi(validasi[0],'bayar');
        }
      }
      
      var respon="fungsi/js.php?ua="+tujuan+".php&"+keterangan+tampung+untuk_radio+untuk_radio2+untuk_radio3+cek;
     // alert(respon);
      xmlhttp.open("POST",respon,true);
      xmlhttp.send();
    }
  }

function halaman2(ev,f,t,l) {
    var halaman = document.createElement("halaman")
    halaman.type = "text/javascript";
    
    var key;
    ev = ev || event;
    key = ev.keyCode;
    if (key == 13) {
      
      arr++;
      if (window.XMLHttpRequest){
          req55[arr]=new XMLHttpRequest();}
      else{
          req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");}
          req55[arr].onreadystatechange=function(){
          if (req55[arr].readyState==1){
              if(t=="v"){
                  document.getElementById(l).value = "Loading..";}
              else{
                  document.getElementById(l).innerHTML = "<div id='pesan'><img src='images/loading2.gif'></div>";}

              }
          else if (req55[arr].readyState==4){
              if(t=="v"){
                  document.getElementById(l).value = req55[arr].responseText;
                  loadScript('js/refres.js', function(){});
              }
              else{
                  document.getElementById(l).innerHTML = req55[arr].responseText;
                  loadScript('js/refres.js', function(){});
          }

          }
          else{}
          }
        req55[arr].open("GET",f,true);
        req55[arr].send();
      }
  }
  function simpan(form,element,keterangan,tujuan,hasil,kode){
  var nilai="";
  var jlh_element=element.split(",");
  var tampung="";
  var penghubung="";
  for (var i =0; i<jlh_element.length;i++) {
      var element=document.getElementById(form).elements[jlh_element[i]].value; 
      if (i==jlh_element.length-1) {
          penghubung="";
      }
      else{
          penghubung="&";
      } 
      tampung=tampung+jlh_element[i]+"="+element+penghubung;
  }
  if (window.XMLHttpRequest){
      // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
  }
  else{
      // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
          
          //document.getElementById(hasil).innerHTML=xmlhttp.responseText;
           nilai=xmlhttp.responseText;
          var validasi=nilai.split("<>");
          for (var i =0; i<jlh_element.length;i++) {
             // var element=document.getElementById(form).elements[jlh_element[i]].value;
              if (validasi[1]=="sukses") {document.getElementById(form).elements[jlh_element[i]].value="";}
              else{} 
              
          }
          if (kode=='ya') {
            if (validasi[1]=="sukses") {
               document.getElementById(form).elements[jlh_element[0]].value=validasi[2];
               document.getElementById(form).elements[jlh_element[1]].value=validasi[3];
               if (hasil=="DF") {

               }
               else{
                  document.getElementById(hasil).innerHTML=validasi[4];
               }
            }
            else{}
          }
          else{}
          notif(validasi[0],'diskonrp');
      }
    }
    
    var respon="fungsi/js.php?ua="+tujuan+".php&"+keterangan+tampung;
    //alert(respon);
    xmlhttp.open("POST",respon,true);
    xmlhttp.send();
}
function edit(form,element,keterangan,tujuan,hasil,kode){
  var nilai="";
  var jlh_element=element.split(",");
  var tampung="";
  var penghubung="";
  for (var i =0; i<jlh_element.length;i++) {
      var element=document.getElementById(form).elements[jlh_element[i]].value; 
      if (i==jlh_element.length-1) {
          penghubung="";
      }
      else{
          penghubung="&";
      } 
      tampung=tampung+jlh_element[i]+"="+element+penghubung;
  }
  if (window.XMLHttpRequest){
      // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
  }
  else{
      // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
          
          //document.getElementById(hasil).innerHTML=xmlhttp.responseText;
           nilai=xmlhttp.responseText;
          var validasi=nilai.split("<>");
          for (var i =0; i<jlh_element.length;i++) {
             // var element=document.getElementById(form).elements[jlh_element[i]].value;
              if (validasi[1]=="sukses") {document.getElementById(form).elements[jlh_element[i]].value="";}
              else{} 
              
          }
          if (kode=='ya') {
            loadScript('js/ref.js', function(){});
            if (validasi[1]=="sukses") {
               document.getElementById(hasil).innerHTML=validasi[2];
                
               kosong();
            }
            else{}
          }
          else{}
          notif(validasi[0],'diskonrp');
      }
    }
    
    var respon="fungsi/js.php?ua="+tujuan+".php&"+keterangan+tampung;
    //alert(respon);
    xmlhttp.open("POST",respon,true);
    xmlhttp.send();
}
function verif(form,element,keterangan,tujuan,hasil,kode){
  var nilai="";
  var jlh_element=element.split(",");
  var tampung="";
  var penghubung="";
  for (var i =0; i<jlh_element.length;i++) {
      var element=document.getElementById(form).elements[jlh_element[i]].value; 
      if (i==jlh_element.length-1) {
          penghubung="";
      }
      else{
          penghubung="&";
      } 
      tampung=tampung+jlh_element[i]+"="+element+penghubung;
  }
  if (window.XMLHttpRequest){
      // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
  }
  else{
      // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
          
          //document.getElementById(hasil).innerHTML=xmlhttp.responseText;
           nilai=xmlhttp.responseText;
          var validasi=nilai.split("<>");
          for (var i =0; i<jlh_element.length;i++) {
             // var element=document.getElementById(form).elements[jlh_element[i]].value;
              if (validasi[1]=="sukses") {document.getElementById(form).elements[jlh_element[i]].value="";}
              else{} 
              
          }
          if (kode=='ya') {
            loadScript('js/ref.js', function(){});
            if (validasi[1]=="sukses") {
               document.getElementById(hasil).innerHTML=validasi[2];
                
               //kosong();
            }
            else{}
          }
          else{}
          notif(validasi[0],'diskonrp');
      }
    }
    
    var respon="fungsi/js.php?ua="+tujuan+".php&"+keterangan+tampung;
    //alert(respon);
    xmlhttp.open("POST",respon,true);
    xmlhttp.send();
}
function selesai(form,element,keterangan,tujuan,hasil,kode){
  var nilai="";
  var jlh_element=element.split(",");
  var tampung="";
  var penghubung="";
  for (var i =0; i<jlh_element.length;i++) {
      var element=document.getElementById(form).elements[jlh_element[i]].value; 
      if (i==jlh_element.length-1) {
          penghubung="";
      }
      else{
          penghubung="&";
      } 
      tampung=tampung+jlh_element[i]+"="+element+penghubung;
  }
  if (window.XMLHttpRequest){
      // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
  }
  else{
      // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
          
          //document.getElementById(hasil).innerHTML=xmlhttp.responseText;
           nilai=xmlhttp.responseText;
          var validasi=nilai.split("<>");
          for (var i =0; i<jlh_element.length;i++) {
             // var element=document.getElementById(form).elements[jlh_element[i]].value;
              if (validasi[1]=="sukses") {document.getElementById(form).elements[jlh_element[i]].value="";}
              else{} 
              
          }
          if (kode=='ya') {
            loadScript('js/ref.js', function(){});
            if (validasi[1]=="sukses") {
               document.getElementById(hasil).innerHTML=validasi[2];
               //document.getElementById(form).elements[jlh_element[1]].value=validasi[3];
               //kosong();
            }
            else{}
          }
          else{}
          notif(validasi[0],'diskonrp');
      }
    }
    
    var respon="fungsi/js.php?ua="+tujuan+".php&"+keterangan+tampung;
    //alert(respon);
    xmlhttp.open("POST",respon,true);
    xmlhttp.send();
}
function simpanreg(form,element,keterangan,tujuan,hasil,kode){
  var nilai="";
  var jlh_element=element.split(",");
  var tampung="";
  var penghubung="";
  for (var i =0; i<jlh_element.length;i++) {
      var element=document.getElementById(form).elements[jlh_element[i]].value; 
      if (i==jlh_element.length-1) {
          penghubung="";
      }
      else{
          penghubung="&";
      } 
      tampung=tampung+jlh_element[i]+"="+element+penghubung;
  }
  if (window.XMLHttpRequest){
      // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
  }
  else{
      // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
          
          //document.getElementById(hasil).innerHTML=xmlhttp.responseText;
           nilai=xmlhttp.responseText;
          var validasi=nilai.split("<>");
          for (var i =0; i<jlh_element.length;i++) {
             // var element=document.getElementById(form).elements[jlh_element[i]].value;
              
              
          }
          if (kode=='ya') {
            if (validasi[1]=="sukses") {
                  kosong();
                  document.getElementById(hasil).innerHTML=validasi[0];
                  notif(validasi[2],'keterangan');
            }
            else{ 
              notif(validasi[0],'keterangan');
            }
          }
          else{}
          
      }
    }
    
    var respon="fungsi/js.php?ua="+tujuan+".php&"+keterangan+tampung;
    //alert(respon);
    xmlhttp.open("POST",respon,true);
    xmlhttp.send();
}

  function kosong(){
  document.body.style.overflow="auto";
  dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.1;background-color:#000000;display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  document.getElementById("js").innerHTML="";
  }
  function kosongad(){
    document.body.style.overflow="auto";
    //dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.1;background-color:#000000;display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
    document.getElementById("jsa").innerHTML="";
  }
  function kosong1(ev){
  var key;
  ev = ev || event;
  key = ev.keyCode;
  if (key == 13) {
      document.body.style.overflow="auto";
      dialog_overlay.style.cssText="position:fixed !important;position:absolute;z-index:999;top:0px;right:0px;bottom:0px;left:0px;opacity:0.1;background-color:#000000;display:inline;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
      document.getElementById("js").innerHTML="";
    }
  }
  
  function hov(){
  document.getElementById("kotak").hover=1;
  }
  
  function tab_show(form,show){
  var n=form.split(",");
     for (i=0;i<n.length;i++){
         document.getElementById(n[i]).style.display="none";
     }
  document.getElementById(show).style.display="inline";
  var tinggi=document.getElementById("detail").offsetHeight + 35;
  form_inpt.style.cssText="font:normal 12px Arial,Sans-Serif;border:0px;width:975px;float:right;padding:0px;margin:0px 0px 0px 0px;position:relative;top:0px;left:0px;height:"+tinggi+"px;background-color:#FFFFFF;transition: all 1s ease;-moz-transition: all 1s ease;-webkit-transition: all 1s ease;-o-transition: all 1s ease;";
  }
  
  
  function onHoverEventForHighest() {
    createMouseEvent(kotak_element, 'mouseover', event);
  }
  function ld(){
  var encode =unescape('%3C%6C%69%6E%6B%20%72%65%6C%3D%27%73%74%79%6C%65%73%68%65%65%74%27%20%74%79%70%65%3D%27%74%65%78%74%2F%63%73%73%27%20%68%72%65%66%3D%27%73%74%79%6C%65%2E%63%73%73%27%20%2F%3E%0A%3C%73%63%72%69%70%74%20%74%79%70%65%3D%27%74%65%78%74%2F%6A%61%76%61%73%63%72%69%70%74%27%20%73%72%63%3D%27%6A%73%2E%6A%73%27%3E%3C%2F%73%63%72%69%70%74%3E');
  alert(encode);
  return encode
  }
  function no_submit(){
  alert('jangan di enter');
  return false;
  }

  function goFullscreen(id) {
    var element = document.getElementById(id);
    if (element.mozRequestFullScreen) {
      element.mozRequestFullScreen();
    } else if (element.webkitRequestFullScreen) {
      element.webkitRequestFullScreen();
   }
  }
  
  function mischandler(){
   //return false;
 }
 function mouseonkeydown(){
   //return false;
 }

function setfocus(event,e)
{
event=event || window.event;
var a=event.keyCode;
if(a==13){
event="";
event.keyCode="";
a="";
document.getElementById(e).focus();}
}

function transfer(i,l,k){
  var k=l.split(",");
  var hasil=i.split(",");
  for (var n=0;n<k.length;n++){
      document.getElementById(k[n]).value = hasil[n].replace(/%/g," ");      
  }
  if (hasil[4]=="KONSUL%BEDAH" || hasil[1]=="SBNK%1") {
            var txt = document.getElementById("harga");
            txt.readOnly = false;
  }
  else{
        if (k=="tidak") {}
        if (k=="ya"){
            var txt = document.getElementById("harga");
            //txt.value = "";
            txt.readOnly = false;
            //alert(hasil[1]);
        }
            
  }
}

function validasi_transfer(l,a,b){
  if (l<=0) {
    alert('Stok Barang 0');
  }
  else{
    transfer(a,b);
    kosong();
  }
}

function keterangan(d,h,g){
  var k=h.split(",");
 
  if (g=="penjualanpaket") {
    for (var n=0;n<k.length;n++){
      document.getElementById(k[n]).value ="Penjualan Paket, "+d.replace(/%/g," ");
    }
  }
  if(g=="pembelian"){
    document.getElementById(h).value ="Pembelian Barang, "+d.replace(/%/g," ");
  }
  if(g=="penjualan"){
    for (var n=0;n<k.length;n++){
        document.getElementById(k[n]).value ="Penjualan, "+d.replace(/%/g," ");
    }
    
  }
  if(g=="pembayaran_piutang"){
    document.getElementById(h).value ="Pembayaran Piutang, "+d.replace(/%/g," ");
  }
  if(g=="pembayaran_hutang"){
    document.getElementById(h).value ="Pembayaran Hutang, "+d.replace(/%/g," ");
  }

  
}

function keterangan1(d,h,g,f){
  if (g=="penjualanpaket") {
      document.getElementById(h).value ="Penjualan Paket, "+d.replace(/%/g," ");
  }
  if(g=="pembelian"){
    document.getElementById(h).value ="Pembelian Barang, "+d.replace(/%/g," ");
  }
  if(g=="penjualan"){
    document.getElementById(h).value ="Penjualan, "+d.replace(/%/g," ");
    document.getElementById(f).value ="";
  }
  if(g=="pembayaran_piutang"){
    document.getElementById(h).value ="Pembayaran Piutang, "+d.replace(/%/g," ");
  }
  if(g=="pembayaran_hutang"){
    document.getElementById(h).value ="Pembayaran Hutang, "+d.replace(/%/g," ");
  }
  
}

function keterangan2(d,h,g,f){
  if (g=="penjualanpaket") {
      document.getElementById(h).value ="Penjualan Paket, "+d.replace(/%/g," ");
  }
  if(g=="pembelian"){
    document.getElementById(h).value ="Pembelian Barang, "+d.replace(/%/g," ");
  }
  if(g=="penjualan"){
    document.getElementById(h).value ="Penjualan, "+d.replace(/%/g," ");
    document.getElementById(f).value ="";
  }
  if(g=="pembayaran_piutang"){
    document.getElementById(h).value ="Pembayaran Piutang, "+d.replace(/%/g," ");
  }
  if(g=="pembayaran_hutang"){
    document.getElementById(h).value ="Pembayaran Hutang, "+d.replace(/%/g," ");
  }
  
}
function keterangan3(d,h,g,f,j){
  if (g=="penjualanpaket") {
      document.getElementById(h).value ="Penjualan Paket, "+d.replace(/%/g," ");
  }
  if(g=="pembelian"){
    document.getElementById(h).value ="Pembelian Barang, "+d.replace(/%/g," ");
  }
  if(g=="penjualan"){
    document.getElementById(h).value ="Penjualan, "+d.replace(/%/g," ");
    document.getElementById(j).value ="";
    document.getElementById(f).value =d.replace(/%/g," ");
  }
  if(g=="pembayaran_piutang"){
    document.getElementById(h).value ="Pembayaran Piutang, "+d.replace(/%/g," ");
  }
  if(g=="pembayaran_hutang"){
    document.getElementById(h).value ="Pembayaran Hutang, "+d.replace(/%/g," ");
  }
  
}

function kosong_input(k,f){
if(err==""){
var l=k.split(",");
     for (var i=0;i<l.length;i++){
         document.getElementById(l[i]).value="";
     }
}
document.getElementById(f).focus();
}

function ambil_nilai(form){
  var jumlah=document.getElementById(form).length;
  var url="";
  for (i=0;i<jumlah;i++){
      if(document.getElementById(form)[i].name.substr(0,1)=="#" && document.getElementById(form)[i].value==""){
      document.getElementById(form)[i].style.background="#FFC0C0";
          if(document.getElementById(form)[i].type=="radio" || document.getElementById(form)[i].type=="checkbox")
              {
                   if(document.getElementById(form)[i].checked==true){
                   url +='&'+document.getElementById(form)[i].name+'='+document.getElementById(form)[i].value;
                   }
              }
              else{
                   url +='&'+document.getElementById(form)[i].name.replace("#","")+'='+document.getElementById(form)[i].value;
                   err+="1";
                   
              }
      }
      else{
          if(document.getElementById(form)[i].type=="radio" || document.getElementById(form)[i].type=="checkbox")
              {
                   if(document.getElementById(form)[i].checked==true){
                   url +='&'+document.getElementById(form)[i].name+'='+document.getElementById(form)[i].value;
                   }
              }
              else{
                   document.getElementById(form)[i].style.background="";
                   url +='&'+document.getElementById(form)[i].name.replace("#","")+'='+document.getElementById(form)[i].value;
              }
      }
  }
return url
}

function tambah(a,b,c){

}

function kali(a,b,c)
{
var a1=document.getElementById(a).value;
var b1=document.getElementById(b).value;
var a2=parseFloat(a1);
var b2=parseFloat(b1);
var hasil=a2 * b2;
document.getElementById(c).value=hasil;
}

function ppn(a,b,c,d,e)
{
var a1=document.getElementById(a).value;
var b1=document.getElementById(b).value;
var c1=document.getElementById(e).value;
var a2=parseFloat(a1);
var b2=parseFloat(b1);
var c2=parseFloat(c1);
var hasil=a2+(((a2 / 100)*b2))-c2;
var hasil1=(((a2 / 100)*b2));
document.getElementById(d).value=hasil1;
document.getElementById(c).value=hasil;
}


function jumlah_angsuran(a,b,c,d)
{
var b1=document.getElementById(b).value;
var c1=document.getElementById(c).value;
var d1=document.getElementById(d).value;
var b2=parseFloat(b1);
var c2=parseFloat(c1);
var d2=parseFloat(d1);
var hasil=(b2+c2)/d2;

document.getElementById(a).value=hasil;
}


function hitung_akhir(a,b,c,d,e,f,g,h,lokasi)
{
var a1=parseFloat(document.getElementById(a).value);
var b1=parseFloat(document.getElementById(b).value);
var c1=parseFloat(document.getElementById(c).value);
var d1=parseFloat(document.getElementById(d).value);
var e1=parseFloat(document.getElementById(e).value);
var f1=parseFloat(document.getElementById(f).value);
var g1=parseFloat(document.getElementById(g).value);
var h1=parseFloat(document.getElementById(h).value);
//alert(a1+"-"+b1+"-"+c1+"-"+d1+"-"+e1+"-"+f1+"-"+g1+"-"+h1);
    if(lokasi=="b"){
        document.getElementById(g).value=b1/a1*100;
        document.getElementById(d).value=a1+b1-c1;
        document.getElementById(f).value=(a1+b1-c1)-e1;
    }
    else if(lokasi=="c"){
        document.getElementById(h).value=c1/a1*100;
        document.getElementById(d).value=a1+b1-c1;
        document.getElementById(f).value=(a1+b1-c1)-e1;
    }
    else if(lokasi=="e"){
        document.getElementById(f).value=d1-e1;
    }
    else if(lokasi=="g"){
        document.getElementById(b).value=a1/100*g1;
        document.getElementById(d).value=a1+(a1/100*g1)-c1;
        document.getElementById(f).value=(a1+(a1/100*g1)-c1)-e1;
    }
    else if(lokasi=="h"){
        document.getElementById(c).value=a1/100*h1;
        document.getElementById(d).value=a1+b1-(a1/100*h1);
        document.getElementById(f).value=(a1+b1-(a1/100*h1))-e1;
    }
}

function tambah_array(k,f){
if(err==""){
var hasil=0;var operator;var element;var ty;
var l=k.split(",");
     for (var i=0;i<l.length;i++){
         operator=l[i].substr(0,1);
         element=l[i].replace(operator,"");
         ty=l[i].substr(1,1);
         if(ty=="@"){
             nilai_asli=element.replace("@","");
             var nilai=parseFloat(nilai_asli);
         }
         else{
             if(document.getElementById(element).value.substr(0,2)=="Rp"){
             var nilai=parseFloat(clear_format1(document.getElementById(element).value));}
             else{
             var nilai=parseFloat(document.getElementById(element).value);}
         }
         uji=isNaN(nilai);
         if(uji==true){ nilai=0;}
         if(operator=="+"){
            hasil=hasil+nilai;}
         else if (operator=="-"){
            hasil=hasil-nilai;}
         else if (operator=="*"){
            if(hasil==0){ hasil=1; }
            hasil=hasil*nilai;}
         else if (operator=="/"){
            if(hasil==0){ hasil=1; }
            hasil=hasil/nilai;}
     }
}

if(hasil=="NaN"){
isi_hasil=0;}
else{
isi_hasil=rupiah(hasil,'Rp');}

if (f.substr(0,1)=="@") {
  lks=f.replace("@","");
  document.getElementById(lks).innerHTML=isi_hasil;
}
else{
  lks=f;
  document.getElementById(lks).value=isi_hasil;
}


}


function transfer_array(k,f){

var l=k.split(",");
var j=f.split(",");
     for (var i=0;i<l.length;i++){
         document.getElementById(l[i]).value=j[i];
     }

}

function transfer_text(k,f){
   var tx=f.replace(/%/g," ");
   document.getElementById(k).value=tx;
}
function auto_com(elm,w,f){
   var element=document.getElementById(elm);
   //element.onblur=function(){document.getElementById("js").innerHTML="";}
   var isi=element.value;
   var lebar =element.offsetWidth;
   var tinggi =element.offsetHeight;
   var left =getleft(elm)-10;
   var top =gettop(elm)+tinggi;
   var l_item=w-30;
   if(isi==null || isi==""){
        document.getElementById("js").innerHTML="";
   }
   else{
        document.getElementById("js").innerHTML="<div id=autocom style=overflow:auto;overflow-x:hidden;width:"+w+"px;max-height:200px;background:#D0D0D0;margin-left:"+left+";margin-top:"+top+";z-index:1000;position:relative;><div id=close style=width:10px;height:5px;float:right;text-align:center;cursor:pointer;><font size=2><b>&#215;</b></font></div><div id=loading_autocom style=width:"+l_item+"px;><center><img src='images/loading.gif'><br><label>Mencari...</label></center></div><div id=autocom_item style=width:"+l_item+"px;></div></div>";
        if (window.XMLHttpRequest){
           req15=new XMLHttpRequest();}
        else{
           req15=new ActiveXObject("Microsoft.XMLHTTP");}

        req15.onreadystatechange=function(){
           if (req15.readyState==1){
               document.getElementById("loading_autocom").style.display = "inline";
           }
           else if (req15.readyState==4){
               document.getElementById("loading_autocom").style.display = "none";
               document.getElementById("autocom_item").innerHTML = req15.responseText;
           }
        }
        req15.open("GET",f+"&cari="+isi,true);
        req15.send();
   }
}

    function getleft(el)
    {
        var element=document.getElementById(el);
        var curNode = element;
        var left    = 0;

        do {
            left += curNode.offsetLeft;
            curNode = curNode.offsetParent;

        } while(curNode.tagName.toLowerCase() != 'body');

        return left;
    }
    function gettop(el)
    {
        var element=document.getElementById(el);
        var curNode = element;
        var top    = 0;

        do {
            top += curNode.offsetTop;
            curNode = curNode.offsetParent;

        } while(curNode.tagName.toLowerCase() != 'body');

        return top;
    }
//----------------------------------------------- start function jzebra
function print_dot(hasil) {
         var applet = document.jzebra;
         applet.append("\x1B\x40");
         applet.append("\x1B\x21\x05");
         document.jzebra.append(hasil);
         document.jzebra.print();
         applet.append("\x1D\x56\x41");
         applet.append("\x1B\x40");
}
function getPath() {
          var path = window.location.href;
          return path.substring(0, path.lastIndexOf("/")) + "/";
}

      function monitorFinding() {
    var applet = document.jzebra;
    if (applet != null) {
     if (!applet.isDoneFinding()) {
        window.setTimeout('monitorFinding()', 100);
     } else {
        var printer = applet.getPrinter();
              alert(printer == null ? "Printer not found" : "Printer \"" + printer + "\" found");
     }
    } else {
            alert("Applet not loaded!");
        }
      }

      function findPrinter() {
         var applet = document.jzebra;
         if (applet != null) {
            // Searches for locally installed printer with "zebra" in the name
            applet.findPrinter("zebra");
         }

         // *Note:  monitorFinding() still works but is too complicated and
         // outdated.  Instead create a JavaScript  function called
         // "jzebraDoneFinding()" and handle your next steps there.
         monitorFinding();
      }

      function useDefaultPrinter() {
         var applet = document.jzebra;
         if (applet != null) {
            applet.findPrinter();
         }

         monitorFinding();
      }
      function findPrinters() {
         var applet = document.jzebra;
         if (applet != null) {
            applet.findPrinter("\\{dummy printer name for listing\\}");
         }

         monitorFinding2();
      }
      function monitorFinding2() {
  var applet = document.jzebra;
  if (applet != null) {
     if (!applet.isDoneFinding()) {
        window.setTimeout('monitorFinding2()', 100);
     } else {
              var printersCSV = applet.getPrinters();
              var printers = printersCSV.split(",");
              document.getElementById("list_printer").innerHTML="";
              for (p in printers) {
                  //alert(printers[p]);
                  document.getElementById("list_printer").innerHTML +="<option value='"+printers[p]+"'>"+printers[p]+"</option>";
              }

     }
  } else {
            alert("Applet not loaded!");
        }
      }
      function set_printer(){

      document.getElementById("printer").value=document.getElementById("list_printer").value;
      }
  
  function load_data_value_array(f,l){
    //alert(f);
  if (window.XMLHttpRequest){
     req1=new XMLHttpRequest();}
  else{
     req1=new ActiveXObject("Microsoft.XMLHTTP");}
  req1.onreadystatechange=function(){
  if (req1.readyState==1){

  }
  else if (req1.readyState==4){
        var hsl=req1.responseText;
        var k=l.split(",");
        var arr_hsl=hsl.split("<>");
        for (var i=0;i<l.length-1;i++){
           document.getElementById(k[i]).value = arr_hsl[i];
        }
  }
  else{}}
  req1.open("GET",f,true);
  req1.send();}

  function eneble_media(m,n,t){
  var jdl=t.replace(/%/g," ");
  if(n=="1"){
     document.getElementById(m).disabled=false;
     document.getElementById(m).style.background="";
     document.getElementById(m).value=jdl;
  }
  else{
     document.getElementById(m).disabled=true;
     document.getElementById(m).style.background="#D0D0D0";
     document.getElementById(m).value=jdl;
  }
  }
  
  function get_value(e){
     var hsl=document.getElementById(e).value;
     return hsl;
  }
function rupiah(n, currency) {
n=parseFloat(n);

uji=isNaN(n);
if(uji==true){ n=0;}
var hasil= currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
return hasil;
}

function formatrupiah(n, currency,l,t) {
n=parseFloat(clear_format(n));
uji=isNaN(n);
if(uji==true){ n=0;}
var hasil= currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
if(t=="v"){
   document.getElementById(l).value=hasil;
}
else{
   document.getElementById(l).innerHTML=hasil;
}
}
function clear_format(n){
if(n.substr(0,2)=="Rp"){
   n=n.replace(/\./g,"");
   n=n.replace(/\,/g,"");
   n=n.replace(/\R/g,"");
   n=n.replace(/\p/g,"");
   var panjang=n.length-2;
   n=n.substr(0,panjang);
}
   return n;
}

function clear_format1(n){
   n=n.replace(/\./g,"");
   n=n.replace(/\,/g,"");
   n=n.replace(/\R/g,"");
   n=n.replace(/\p/g,"");
   var panjang=n.length-2;
   n=n.substr(0,panjang);
   return n;
}

function menu_focus(elm){
   elm.style.background="#008000";
   elm.style.color="#FFFFFF";
   elm.style.width="90%";
   if(!mn=="" || mn==elm){
       mn.style.background="#D0D0D0";
       mn.style.color="#404040";
       mn.style.width="80%";
   }
   if(mn==elm){
       elm.style.background="#008000";
       elm.style.color="#FFFFFF";
       elm.style.width="90%";
   }
   mn=elm;
}

function sub_menu_focus(elm){
   elm.style.background="#008000";
   elm.style.color="#FFFFFF";
   if(!sbmn==""){
       sbmn.style.background="#D0D0D0";
       sbmn.style.color="#404040";
   }
   if(sbmn==elm){
       elm.style.background="#008000";
       elm.style.color="#FFFFFF";
   }
   sbmn=elm;
}

function nama_akun(element, akun , text , lokasi){
  var lk=lokasi.split(",");
  var isi=akun.split(",");
  //alert(isi);
  if (document.getElementById(element).checked==true) {

    var tx=isi[0].replace(/_/g," ");
    var akn=tx.split(":");
    var nama_akun=akn[1].replace(/_/g," ");
    document.getElementById(lk[0]).value=akn[0];
    var nm_akun=document.getElementById(text).value;
    document.getElementById(lk[1]).value=nama_akun +' '+ nm_akun;
  }
  else{
    var tx=isi[1].replace(/_/g," ");
    var akn=tx.split(":");
    var nama_akun=akn[1].replace(/_/g," ");
    document.getElementById(lk[0]).value=akn[0];
    document.getElementById(lk[1]).value=nama_akun;
  }
}

function move_text(event,e,s)
{
event=event || window.event;
var a=event.keyCode;
if(a==s){
event="";
event.keyCode="";
a="";
document.getElementById(e).focus();}
}

function arr_load(f,l,t,d){
if(err==""){
  if (window.XMLHttpRequest){
     req51=new XMLHttpRequest();}
  else{
     req51=new ActiveXObject("Microsoft.XMLHTTP");}
  req51.onreadystatechange=function(){
  if (req51.readyState==1){
        document.getElementById("loading").style.display = "inline";
  }
  else if (req51.readyState==4){
    var lokasi=l.split(",");
    var respon=req51.responseText.split("<####>");
      for (var i=0;i<lokasi.length;i++){
        if (lokasi[i].substr(0,1)=="@") {
          document.getElementById(lokasi[i].replace("@","")).innerHTML = respon[i];
        }
        else{
          document.getElementById(lokasi[i]).value = respon[i];
        }
      }
      window.history.pushState("object or string", "Title", "?"+t);
      document.getElementById("loading").style.display = "none";
  }
  else{}}
  req51.open("POST","data.php?acc_con=js_acc&"+f,true);
  req51.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  req51.setRequestHeader("Content-length", d.length);
  req51.setRequestHeader("Connection", "close");
  req51.send(d);
}
else{
  err="";
}
}

function view(e,lk,i,l){
 var input =i;
 var lebar=l;
 var lks=lk;
 var fr=new FileReader();
 fr.onload=function(e){
   var img=new Image();
   img.onload=function(){
   var MAXWidthHeight=l;
   var r=MAXWidthHeight/Math.max(this.width,this.height),
   w=Math.round(this.width*r),
   h=Math.round(this.height*r),
   c=document.createElement("canvas");
   c.width=w;c.height=h;
   c.getContext("2d").drawImage(this,0,0,w,h);
   var url=c.toDataURL();
   document.getElementById(lks).src=url;
   document.getElementById(input).value=url;
  }
  img.src=e.target.result;
 }
 fr.readAsDataURL(e.target.files[0]);
}
function absen(n,e,s,b){
  var nilai=n.split(",");
  var elm=e.split(",");
  var setting=s.split(",");
  for (var i=0;i<elm.length;i++){
    if (b==nilai[0]) {
      document.getElementById(elm[i]).disabled=setting[0];
    }
    else if (b==nilai[1]) {
      document.getElementById(elm[i]).disabled=setting[1];
    }
  }
}


function load_dt(file,lokasi){
  if (window.XMLHttpRequest){
     req=new XMLHttpRequest();}
  else{
     req=new ActiveXObject("Microsoft.XMLHTTP");}
  req.onreadystatechange=function(){
  if (req.readyState==1){}
  else if (req.readyState==4){
    document.getElementById(lokasi).value = req.responseText;}
  else{}
  }

  req.open("GET",file,true);
  req.send();
}

function get_value(elm){
  var hrl=document.getElementById(elm).value;
  return hrl;
}

function nama_akn(element, akun , text , lokasi){
    var lk=lokasi.split(",");
    var isi=akun.split(",");
    var tx=isi[0].replace(/_/g," ");
    var akn=tx.split(":");
    var nama_akun=akn[1].replace(/_/g," ");
    document.getElementById(lk[0]).value=akn[0];
    var nm_akun=document.getElementById(text).value;
    document.getElementById(lk[1]).value=nama_akun +' '+ nm_akun;
}

var arr=0;
  var req55=new Array();
  
  function load_data5(f,t,text,l){
    var hasil_text=document.getElementById(text).value;
  arr++;
  if (window.XMLHttpRequest){
     req55=new XMLHttpRequest();}
  else{
     req55=new ActiveXObject("Microsoft.XMLHTTP");}
  req55.onreadystatechange=function(){
  if (req55.readyState==1){
    
  }
  else if (req55.readyState==4){
    var respon=req55.responseText.split("<>");
    var lokasi=l.split(",");
    if(t=="v"){
        
        document.getElementById(lokasi[0]).value = respon[0];
        document.getElementById(lokasi[1]).value = respon[1]+ ' ' + hasil_text;
        }
    else{
        document.getElementById(lokasi[0]).innerHTML = respon[0];
        document.getElementById(lokasi[1]).innerHTML = respon[1]+ ' ' + hasil_text;
        }
  }
  else{}}
  req55.open("GET",f,true);
  req55.send();}

//window.setTimeout("waktu()",1000); 
//function waktu() {
//var tanggal = new Date(); 
//setTimeout("waktu()",1000); 
//document.getElementById("tanggalku").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds(); 
// } 

function maksimal(a,b,c)
{
var a1=document.getElementById(a).value;
var b1=document.getElementById(b).value;
var a2=parseFloat(a1);
var b2=parseFloat(b1);
if(b2>a2){
document.getElementById(c).value=a2;}
}

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;
return true;
}


function loadUrl(location)
{
this.document.location.href = location;
}

function validasi_text(form,nama)
{
  var total=document.getElementById(form).length;

  for (var i=0;i<total;i++){
  if(document.getElementById(form)[i].name.value==""){
  alert("Name cannot be empty");
  document.getElementById(form)[i].value=="$_POST[form]"
  myform.name.focus();
  return false;
 }
}
return true;
}

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
function diskona(a,b,c,d,e,f){
  var ak=document.getElementById(a).value;
  var bk=clear_format(document.getElementById(b).value);
  var ck=document.getElementById(c).value;
  var dk=clear_format(document.getElementById(d).value);
  var potong=ak.split(" ");
 // var fk=clear_format(document.getElementById(f).value);
//var dk=document.getElementById(d).value;
  if (e=="diskonpersen") {
    var jumlah=ak*bk;
    var hasil=jumlah*ck/100;
    var setelahdiskon=jumlah-hasil;
    uji=isNaN(hasil);
    if(uji==true){ hasil=0;setelahdiskon=0;}
      document.getElementById(d).value="Rp. " + hasil.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
      document.getElementById(f).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
  else if (e=="diskonrp") {
    var jumlah=ak*bk;
    var hasil=dk/jumlah*100;
    var setelahdiskon=jumlah-dk;
    uji=isNaN(hasil);
    if(uji==true){hasil=0;}
    document.getElementById(c).value=hasil;
    document.getElementById(f).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
  else if (e=="diskonhuruf") {
    var jumlah=potong[0]*bk;
    var hasil=jumlah*ck/100;
    var setelahdiskon=jumlah-hasil;
    uji=isNaN(hasil);
    if(uji==true){ hasil=0;setelahdiskon=0;}
      document.getElementById(d).value="Rp. " + hasil.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
      document.getElementById(f).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
}
function diskona1(a,b,c,d,e,f,j){
  var ak=document.getElementById(a).value;
  var bk=clear_format(document.getElementById(b).value);
  var ck=document.getElementById(c).value;
  var dk=clear_format(document.getElementById(d).value);
  var val=document.getElementById(j).value;
 // var fk=clear_format(document.getElementById(f).value);
//var dk=document.getElementById(d).value;
if (e=="diskonpersen") {
  if (val=="0") {
    var jumlah=ak*bk;
    var hasil=jumlah*ck/100;
    var setelahdiskon=jumlah-hasil;
    uji=isNaN(hasil);
  }
  else{
    var hasil=val*ck/100;
    var setelahdiskon=val-hasil;
    uji=isNaN(hasil);
  }
  
  if(uji==true){ hasil=0;setelahdiskon=0;}
    document.getElementById(d).value="Rp. " + hasil.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    document.getElementById(f).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
else{

  var jumlah=ak*bk;
  var hasil=dk/jumlah*100;
  var setelahdiskon=jumlah-dk;
  uji=isNaN(setelahdiskon);
  if(uji==true){setelahdiskon=0;}
  document.getElementById(c).value=hasil;
  document.getElementById(f).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
}
function diskona_sub_total(a,b,c,d,e,f){
  var setelahdiskon=0;
  var ak=clear_format(document.getElementById(a).value);
  var bk=clear_format(document.getElementById(b).value);
  var ck=clear_format(document.getElementById(c).value);
  var dk=clear_format(document.getElementById(d).value);
  var fk=clear_format(document.getElementById(f).value);
 // var fk=clear_format(document.getElementById(f).value);
//var dk=document.getElementById(d).value;
if (e=="diskonpersen") {
  var jumlah=ak;
  var hasil=jumlah*bk/100;
  if (fk=="") {
    var setelahdiskon=jumlah-hasil;
  }
  else{
    var setelahdiskon=(jumlah-hasil);
    var n=parseInt(setelahdiskon)+parseInt(fk);
    setelahdiskon=n;
  }
  
  uji=isNaN(setelahdiskon);
  if(uji==true){ hasil=0;setelahdiskon=0;}
    document.getElementById(c).value="Rp. " + hasil.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    document.getElementById(d).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
else{
  var jumlah=ak;
  var hasil=ck/jumlah*100;
  var setelahdiskon=jumlah-ck;
  if (fk=="") {
    var setelahdiskon=jumlah-ck;
  }
  else{
    var setelahdiskon=(jumlah-ck);
    var n=parseInt(setelahdiskon)+parseInt(fk);
    setelahdiskon=n;
  }
  uji=isNaN(setelahdiskon);
  if(uji==true){setelahdiskon=0;hasil=0;}
  document.getElementById(b).value=hasil;
  document.getElementById(d).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
}
function sub_total_ppn(a,b,c,d,e,f){
  var setelahdiskon=0;
  var ak=clear_format(document.getElementById(a).value);
  var bk=clear_format(document.getElementById(b).value);
  var ck=clear_format(document.getElementById(c).value);
  var dk=clear_format(document.getElementById(d).value);
  var fk=clear_format(document.getElementById(f).value);
//var dk=document.getElementById(d).value;
if (e=="ppnpersen") {
  var jumlah=ak;
  var hasil_persen=jumlah*fk/100;
  var jumlah_hasil_persen=jumlah-hasil_persen;
  var hasil_ppn=jumlah*bk/100;
  
  if (fk=="") {
    var setelahdiskon=parseInt(jumlah)+parseInt(hasil_ppn);
  }
  else{
    var setelahdiskon=parseInt(jumlah)+parseInt(hasil_ppn);
    var n=parseInt(setelahdiskon)-parseInt(fk);
    setelahdiskon=n;
  }
  uji=isNaN(hasil_ppn);
  if(uji==true){ hasil_ppn=0;setelahdiskon=0;}
    document.getElementById(c).value="Rp. " + hasil_ppn.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    document.getElementById(d).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
else{
  var jumlah=ak;
  var hasil=ck/jumlah*100;
  //var setelahdiskon=jumlah+dk;
  if (fk=="") {
    var setelahdiskon=parseInt(jumlah)+parseInt(ck);
  }
  else{
    var setelahdiskon=parseInt(jumlah)+parseInt(ck);
    var n=parseInt(setelahdiskon)-parseInt(fk);
    setelahdiskon=n;
  }
  uji=isNaN(setelahdiskon);
  if(uji==true){setelahdiskon=0;}
  document.getElementById(b).value=hasil;
  document.getElementById(d).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
}
function dibayar(a,b,c,d){
  var ab=clear_format(document.getElementById(a).value);
  var bb=clear_format(document.getElementById(b).value);
  var tambah=parseInt(clear_format(document.getElementById(c).value));
  //var jlkdi=clear_format(document.getElementById('biaya_lain_lain').value);
  var n=parseInt(ab)+tambah;
  var hasil=n-bb;
  uji=isNaN(hasil);
  if(uji==true){hasil=0;}
  document.getElementById(d).value="Rp. " + hasil.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function dibayara(a,b,c,d){
  var ab=clear_format(document.getElementById(a).value);;
  var bb=clear_format(document.getElementById(b).value);
  var tambah=parseInt(clear_format(document.getElementById(c).value));
  //var jlkdi=clear_format(document.getElementById('biaya_lain_lain').value);
  var n=parseInt(bb)+tambah;
  var hasil=ab-n;
  uji=isNaN(hasil);
  if(uji==true){hasil=0;}
  document.getElementById(d).value="Rp. " + hasil.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function jumlah(a,b,c){
  var abc=clear_format(document.getElementById(a).value);
  var bbc=clear_format(document.getElementById(b).value);
  //var tambah=parseInt(clear_format(document.getElementById(c).value));
  //var jlkdi=clear_format(document.getElementById('biaya_lain_lain').value);
  var n=parseInt(abc)+parseInt(bbc);
  //var hasil=n-bb;
  uji=isNaN(n);
  if(uji==true){n=0;}
  document.getElementById(c).value="Rp. " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function dibayar1(a,b,c,da){
  var ab=clear_format(document.getElementById(a).value);
  var bb=clear_format(document.getElementById(b).value);
  var ac=clear_format(document.getElementById(da).value);
  var tambah=parseInt(clear_format(document.getElementById(c).value));
  //var jlkdi=clear_format(document.getElementById('biaya_lain_lain').value);
  var n=(parseInt(ab)+parseInt(ac))-parseInt(bb);
  var h=parseInt(ab)+parseInt(ac);
  var hasil=n;
  var d=0;
  uji=isNaN(hasil);
  if(uji==true){hasil=0;}
  if (parseInt(h)<parseInt(bb)) {
    document.getElementById(b).value=h;
    document.getElementById(c).value="Rp. " + d.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
  else{
    document.getElementById(c).value="Rp. " + hasil.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
  
}
function dibayar1q(a,b,c){
  var ab=clear_format(document.getElementById(a).value);
  var bb=clear_format(document.getElementById(b).value);
  //var ac=clear_format(document.getElementById(da).value);
  var tambah=parseInt(clear_format(document.getElementById(c).value));
  //var jlkdi=clear_format(document.getElementById('biaya_lain_lain').value);
  var n=parseInt(ab)-parseInt(bb);
  var h=parseInt(bb)-parseInt(ab);
  var hasil=n;
  var d=0;
  uji=isNaN(hasil);
  if(uji==true){hasil=0;}
  if (parseInt(ab)<parseInt(bb)) {
    document.getElementById(b).value=ab;
    document.getElementById(c).value="Rp. " + d.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    //document.getElementById(c).innerHTML="Rp. " + h.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
  else{
    document.getElementById(c).value="Rp. " + hasil.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }
  
}
function dibayar1q2jk(a,b,c,d){
  var ab=clear_format(document.getElementById(a).value);
  var bb=clear_format(document.getElementById(b).value);
  var fg=clear_format(document.getElementById(c).value)

  //var ac=clear_format(document.getElementById(da).value);
  var tambah=parseInt(clear_format(document.getElementById(d).value));
  //var jlkdi=clear_format(document.getElementById('biaya_lain_lain').value);
  var n=parseInt(bb)+parseInt(fg);
  var h=parseInt(ab)-n;
  var hasil=ab;
  //var d=0;
  uji=isNaN(hasil);
  if(uji==true){hasil=0;}
  
    document.getElementById(d).value="Rp. " + h.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
 
  
}
function ket(a,b,c){
  if(a=="Hutang"){
    document.getElementById(b).value="Hutang";
    document.getElementById(c).value="Hutang";
  }
  else{
    document.getElementById(b).value="Tunai";
    document.getElementById(c).value="Tunai";

  }
}
function ket1(a,b){
 var k=b.split(",");
 for (var n=0;n<k.length;n++){
    document.getElementById(k[n]).value=a;
  }
}


function showBoxes(frm){
   var message = "Your chose:\n\n"

   //For each checkbox see if it has been checked, record the value.
   for (i = 0; i < frm.treatmen.length; i++)
      if (frm.treatmen[i].checked){
         message = message +"treatmen"+i +frm.treatmen[i].value + "\n"
      }

   //For each radio button if it is checked get the value and break.
   for (var i = 0; i < frm.Performer.length; i++){
      if (frm.Performer[i].checked){
         message = message + "\n" + frm.Performer[i].value
         break
      }
   }
   alert(message)
}

function myFunction() {
    document.getElementById("myBtn").disabled = true;
}
function tgl_klik(a,b){
  var aa=document.getElementById(a).value;
  document.getElementById(b).value=aa;
}
//function ceng(a,b){
 // var a=document.getElementById(a).value
//}

function loadScript(url, callback){

    var script = document.createElement("script")
    script.type = "text/javascript";

    if (script.readyState){  //IE
        script.onreadystatechange = function(){
            if (script.readyState == "loaded" ||
                    script.readyState == "complete"){
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {  //Others
        script.onload = function(){
            callback();
        };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}
function loadScript1(url, callback){

    var script = document.createElement("script")
    script.type = "text/javascript";

    if (script.readyState){  //IE
        script.onreadystatechange = function(){
            if (script.readyState == "loaded" ||
                    script.readyState == "complete"){
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {  //Others
        script.onload = function(){
            callback();
        };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}
function loadScript2(url, callback){

    var script = document.createElement("script")
    script.type = "text/javascript";

    if (script.readyState){  //IE
        script.onreadystatechange = function(){
            if (script.readyState == "loaded" ||
                    script.readyState == "complete"){
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {  //Others
        script.onload = function(){
            callback();
        };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}
function valttgl(tgl,tmpl){
  var a = document.getElementById(tgl).value;
  document.getElementById(tmpl).value="diklik";
}
function dd(dt,f,t,l) {
        
      arr++;
      if (window.XMLHttpRequest){
          req55[arr]=new XMLHttpRequest();}
      else{
          req55[arr]=new ActiveXObject("Microsoft.XMLHTTP");}
          req55[arr].onreadystatechange=function(){
          if (req55[arr].readyState==1){
              if(t=="v"){
                  document.getElementById(l).value = "Loading..";}
              else{
                  document.getElementById(l).innerHTML = "<div style='position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 9990;'><p align='center'><div style='z-index:1;position :relative;top:50px;' ><p align=center><img src='sistem/img/load.gif' width='70px' height='70px'/></p></div></div>";}

              }
          else if (req55[arr].readyState==4){
              if(t=="v"){
                  document.getElementById(l).value = req55[arr].responseText;
                  
                  loadScript1('js/jquery-1.9.1.js', function(){});
                  loadScript2('js/jquery-ui.js', function(){});
              }
              else{
                  document.getElementById(l).innerHTML = req55[arr].responseText;

          }

          }
          else{}
          }
        req55[arr].open("GET",f+'?page='+dt,true);
        req55[arr].send();
      //}
  }
function notif(nilai) {
        var bttn = document.getElementById( 'notification-trigger' );

        // make sure..
        //bttn.disabled = tr;

        //bttn.addEventListener( 'click', function() {
          // simulate loading (for demo purposes only)
          classie.add( bttn, 'active' );
          setTimeout( function() {

            classie.remove( bttn, 'active' );
            
            // create the notification
            var notification = new NotificationFx({
              message : '<span class="icon icon-megaphone"></span><p>'+nilai+' Terimakasih</p>',
              layout : 'bar',
              effect : 'slidetop',
              type : 'notice', // notice, warning or error
              onClose : function() {
                //bttn.disabled = false;
              }
            });

            // show the notification
            notification.show();

          }, 1200 );
          
          // disable the button (for demo purposes only)
          //this.disabled = true;
        //} );
      }
      function notiftransaksi(nilai,div) {
        var bttn = document.getElementById( div );
          classie.add( bttn, 'active' );
          setTimeout( function() {

            classie.remove( bttn, 'active' );
            
            // create the notification
            var notification = new NotificationFx({
              message : '<span class="icon icon-megaphone"></span><p>'+nilai+' Terimakasih</p>',
              layout : 'bar',
              effect : 'slidetop',
              type : 'notice', // notice, warning or error
              onClose : function() {
                //bttn.disabled = false;
              }
            });

            // show the notification
            notification.show();

          }, 1200 );
          
      }
      function pesan_konfirmasi(nama,tujuan,detail){
        //alert(nama);
        var jdl=nama.replace(/%/g," ");
        swal({
          title: "Kamu yakin Akan Menghapus?",
          text: jdl,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Yes, Hapus!',
          cancelButtonText: "No, Batalkan!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            loadScript('js/ref.js', function(){});
            swal("Terhapus!","'"+jdl+"'"+ " Terhapus!", "success");
            load_data1(tujuan,'i',detail);
          } else {
            swal("Cancelled", "'"+jdl+"' Batal Dihapus! :)", "error");
          }
        });
      };
      function CheckCheckboxes1(chk,nama,isi,c,f,k,l,m){
        var ds=document.getElementById(isi).value;
        var harga=clear_format(document.getElementById(c).value);
        var jumlah=document.getElementById(k).value;
        var cadhrg=document.getElementById(l).value;
        var member=document.getElementById(m).value;
        var txt = document.getElementById(nama);
        if(chk.checked == true)
        {
          if (member=="Member_Student") {
            var ttl=parseInt(harga)*parseInt(jumlah);
            var diskon=(parseInt(ttl)*parseInt(ds))/100;
            var gdwqw=ttl-diskon;
            document.getElementById(f).value=cadhrg;
            document.getElementById(c).value=cadhrg;
            txt.value = "";
            txt.readOnly = false;
          }
          else{
            var ttl=parseInt(harga)*parseInt(jumlah);
            var diskon=(parseInt(ttl)*parseInt(ds))/100;
            var gdwqw=ttl-diskon;
            document.getElementById(f).value=gdwqw;
            document.getElementById(c).value=gdwqw;
            txt.value = "";
            txt.readOnly = false;
          }
            
        }
        else
        {               
            var txt = document.getElementById(nama);
            txt.value = ds;
            txt.readOnly = true;
            document.getElementById(f).value="0";
            document.getElementById(c).value=cadhrg;
        }
    }
    function checksimpan(form,chk,DFF,element,hasil,js){
        var nama=document.getElementById(DFF).value;
        var target="fungsi/js.php?ua=js_fungsi.php&";
        var nilai="";
        var respon="";
        var jlh_element=element.split(",");
        var tampung="";
        var penghubung="";
        //cek check
        if(chk.checked == true){
            nilai="ceklis=ya&kode="+nama+"&";
            //alert("terpilih di pilih "+nama);
        }
        else{  
            nilai="ceklis=batal&kode="+nama+"&";             
            //alert("Batal di pilih"+nama);
        }
        //hituung element
        for (var i =0; i<jlh_element.length;i++) {
            var element=document.getElementById(form).elements[jlh_element[i]].value; 
            if (i==jlh_element.length-1) {
                penghubung="";
            }
            else{
                penghubung="&";
            } 
            tampung=tampung+jlh_element[i]+"="+element+penghubung;
        }

        if (window.XMLHttpRequest){
              xmlhttp=new XMLHttpRequest();
        }
        else{
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function(){
          if (xmlhttp.readyState<3){
            var amountLoaded = 0;
            progressBarSim(amountLoaded);
          }
          else 
          if (xmlhttp.readyState==4 && xmlhttp.status==200){
              //document.getElementById(hasil).innerHTML=xmlhttp.responseText;
              respon=xmlhttp.responseText;
              var validasi=respon.split("<>");
             
              if (validasi[1]=="sukses") {
                  document.getElementById(hasil).innerHTML=validasi[2];
              }
              else{

              }
              notif(validasi[0],'notification-trigger');
          }
        }
        
        var respon_xml=target+js+nilai+tampung;
        //alert(respon_xml);
        xmlhttp.open("POST",respon_xml,true);
        xmlhttp.send();   
    }
    function dp_paket(form,element,hasil,js){
        //var nama=document.getElementById(DFF).value;
        var target="fungsi/js.php?ua=js_fungsi.php&";
        var nilai="";
        var respon="";
        var jlh_element=element.split(",");
        var tampung="";
        var penghubung="";
        //cek check
        
            nilai="ceklis=ya&";             
            //alert("Batal di pilih"+nama);
       
        //hituung element
        for (var i =0; i<jlh_element.length;i++) {
            var element=document.getElementById(form).elements[jlh_element[i]].value; 
            if (i==jlh_element.length-1) {
                penghubung="";
            }
            else{
                penghubung="&";
            } 
            tampung=tampung+jlh_element[i]+"="+element+penghubung;
        }

        if (window.XMLHttpRequest){
              xmlhttp=new XMLHttpRequest();
        }
        else{
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function(){
          if (xmlhttp.readyState<3){
            var amountLoaded = 0;
            progressBarSim(amountLoaded);
          }
          else 
          if (xmlhttp.readyState==4 && xmlhttp.status==200){
              //document.getElementById(hasil).innerHTML=xmlhttp.responseText;
              respon=xmlhttp.responseText;
              var validasi=respon.split("<>");
             
              if (validasi[1]=="sukses") {
                  document.getElementById(hasil).innerHTML=validasi[2];
              }
              else{

              }
              notif(validasi[0],'notification-trigger');
          }
        }
        
        var respon_xml=target+js+nilai+tampung;
        //alert(respon_xml);
        xmlhttp.open("POST",respon_xml,true);
        xmlhttp.send();   
    }
    function buka_text(a,b){
      var txt = document.getElementById(b);
      if(a.checked == true){
        txt.value = "";
        txt.readOnly = false;
      }
      else{
        txt.value = "0";
        txt.readOnly = true;
      }
    }
    function bayar(a,b,c,d,e){
      var total=clear_format(document.getElementById(a).value);
      var bayardis=document.getElementById(b).value;
      var bayarrpa=clear_format(document.getElementById(c).value);
      if (e=="bayarpersen") {
        var hasil=bayardis*total/100;
        var setelahdiskon=total-hasil;
        uji=isNaN(hasil);
        if(uji==true){ hasil=0;setelahdiskon=0;}
          document.getElementById(c).value="Rp. " + hasil.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
          document.getElementById(d).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
      }
      else if(e=="bayarrp"){
        var hasil=bayarrpa/total*100;
        var setelahdiskon=total-bayarrpa;
        uji=isNaN(hasil);
        if(uji==true){ hasil=0;setelahdiskon=0;}
          document.getElementById(b).value=hasil;
          document.getElementById(d).value="Rp. " + setelahdiskon.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
      }
    }
    function bayarseluruh_transaksi(a,b,c,d,f){
      var sub_total = clear_format(document.getElementById(a).value);
      var bayar_cash = clear_format(document.getElementById(b).value);
      var card_cash = clear_format(document.getElementById(c).value);
      var vocer = clear_format(document.getElementById(d).value);  
      if (bayar_cash=="") {
        var card_cash = 0;
      }
      else{
        var card_cash = clear_format(document.getElementById(c).value);
      }
      var ttl = parseInt(bayar_cash)+parseInt(card_cash)+parseInt(vocer);
      var hsl = sub_total-ttl;
      uji=isNaN(hsl);
      if(uji==true){ hsl=0;}
      document.getElementById(f).value="Rp. " + hsl.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    }

    function jumlah_gaji_dokter(a,b,c,d,e,f,g,h,i,j,k,l,m){
      var total_gaji=clear_format(document.getElementById(a).value);
      var hari_kerja=clear_format(document.getElementById(b).value);
      var potongan_kehadiran=clear_format(document.getElementById(c).value);
      var potongan_keterlambatan=clear_format(document.getElementById(d).value);
      var reward_absen=clear_format(document.getElementById(e).value);
      var bb_karyawan=clear_format(document.getElementById(f).value);
      var bonus_pencapaian=clear_format(document.getElementById(g).value);
      var bonus_pencapaian_dr_florine=clear_format(document.getElementById(h).value);
      var tunjuangan_bpjs=clear_format(document.getElementById(i).value);
      var potongan_sp=clear_format(document.getElementById(j).value);
      var potongan_pinjaman=clear_format(document.getElementById(k).value);

      var potongan=parseInt(potongan_kehadiran)+parseInt(potongan_keterlambatan)+parseInt(potongan_sp)+parseInt(potongan_pinjaman);
      var bonus=parseInt(reward_absen)+parseInt(tunjuangan_bpjs)+parseInt(bonus_pencapaian)+parseInt(bonus_pencapaian_dr_florine)
      
      var gajinya=total_gaji*hari_kerja;
      var ttl=(parseInt(gajinya)+parseInt(bonus))-parseInt(potongan);
      document.getElementById(l).value="Rp. " + ttl.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
     
    }
    function jumlah_gaji(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v){
      var total_gaji=clear_format(document.getElementById(a).value);
      var hari_kerja=clear_format(document.getElementById(b).value);
      var potongan_kehadiran=clear_format(document.getElementById(c).value);
      var potongan_keterlambatan=clear_format(document.getElementById(d).value);
      var program_bulanan=clear_format(document.getElementById(e).value);
      var reward_absen=clear_format(document.getElementById(f).value);
      var bb_karyawan=clear_format(document.getElementById(g).value);
      var bonus_pencapaian=clear_format(document.getElementById(h).value);
      var bonus_pencapaian_dr_florine=clear_format(document.getElementById(i).value);
      var tunjuangan_bpjs=clear_format(document.getElementById(j).value);
      var lembur=clear_format(document.getElementById(k).value);
      var responsif=clear_format(document.getElementById(l).value);
      var kedisiplinan=clear_format(document.getElementById(m).value);
      var peformance=clear_format(document.getElementById(n).value);
      var sb=clear_format(document.getElementById(o).value);
      var tes_karyawan=clear_format(document.getElementById(p).value);
      var reward_program=clear_format(document.getElementById(q).value);
      var reward_pelayanan=clear_format(document.getElementById(r).value);
      var potongan_sp=clear_format(document.getElementById(s).value);
      var potongan_pinjaman=clear_format(document.getElementById(t).value);

      var potongan=parseInt(potongan_kehadiran)+parseInt(potongan_keterlambatan)+parseInt(program_bulanan)+parseInt(bb_karyawan)+parseInt(responsif)+parseInt(kedisiplinan)+parseInt(peformance)+parseInt(sb)+parseInt(tes_karyawan)+parseInt(reward_program)+parseInt(reward_pelayanan)+parseInt(potongan_sp)+parseInt(potongan_pinjaman);
      var bonus=parseInt(reward_absen)+parseInt(tunjuangan_bpjs)+parseInt(lembur)+parseInt(bonus_pencapaian)+parseInt(bonus_pencapaian_dr_florine)
      if (v=="Security") {
        var gj=total_gaji/20;
        var gajinya=gj*hari_kerja;
        var gaji_bersih=(gajinya+bonus)-potongan;
        var ttl=(parseInt(total_gaji)+parseInt(bonus))-parseInt(potongan);
        document.getElementById(u).value="Rp. " + ttl.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
      }
      else{
        var ttl=(parseInt(total_gaji)+parseInt(bonus))-parseInt(potongan);
        document.getElementById(u).value="Rp. " + ttl.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
      }
    }