document.addEventListener("DOMContentLoaded", ()=>{
    //valider dsi on est sur la accueil
    const home = document.querySelector('.home');
    if (home){
       new Splide( '.splide' ).mount(); 
    }
     new SimpleLightbox({elements: '.imageGallery1 a'});

     const entrevue = document.querySelector(".page-template-template-entrevues");
     if(entrevue){
        document.querySelector('.btn-all').disabled = true;
   
     };
});



function showEntrevueType(type, btn){

 document.querySelectorAll('button').forEach((item)=>{
    item.disabled = false;
 });
  btn.disabled =true;


   //cacher tous les elements 

   const items = document.querySelectorAll('a.entrevue');
   items.forEach((item)=>{
      if(type == 'all'){
         item.style.display = 'flex';
      }else{
         if(type == item.dataset.type){
            item.style.display = 'flex';
         }else{
             item.style.display = 'none';
         }
      }
     
   });
   
}

