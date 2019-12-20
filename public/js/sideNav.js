jQuery(document).ready(function($){
    let servisOpened = false;
    let sideNavOpened = false;
   $("#sideNavToggle").click(function (){
       $("#app").toggleClass("toggled");

   });
   $('#servis-menu').click(function (e) {
       e.preventDefault();
       if (!servisOpened){
           $('.servis-menu').css({'height': 'auto', 'opacity': '1', 'transform': 'translateY(0px)'});
           servisOpened = true;
       }else{
           $('.servis-menu').css({'transform': 'translateY(-15px)', 'opacity': '0', 'height': '0'});
           servisOpened = false;
       }
   });
});
