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
   //document.getElementById(lks).src=url;
   document.getElementById(input).value=url;
   console.log(url);
  }
  img.src=e.target.result;
 }
 fr.readAsDataURL(e.target.files[0]);
}