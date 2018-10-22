  $("document").ready(function(){

        $('#heart').on({
            'click': function() {

                 var src = ($(this).attr('src') === 'Images/like-1.png')
                    ? 'Images/like.png'
                    : 'Images/like-1.png';
                    // if ($(this).attr('src') === 'Images/like-1.png') {
                    //   like = false;
                    // }else if($(this).attr('src') === 'Images/like.png') {
                    //   like = true;
                    // }
                 $(this).attr('src', src);
            }
        });

        //       On Hover download
                      $("#downloadarrow").mouseenter(function(){
                           $(this).attr('src','Images/download-2.png');
                      });
                      $("#downloadarrow").mouseleave(function(){
                          $(this).attr('src','Images/download-1.png');
                      });



  document.getElementById("signup-btn").onclick = function () {
    location.href = "http://159.203.32.48/signup-form.php";
  };

  document.getElementById("login-btn").onclick = function () {
  location.href = "http://159.203.32.48/login-form.php";
  };





  //On Hover
         // $("#heart").mouseenter(function(){
         //   if(!like){
         //      $(this).attr('src','Images/like.png');
         //    }
         //
         // });
         // $("#heart").mouseleave(function(){
         //   if (!like) {
         //     $(this).attr('src','Images/like-1.png');
         //   }
         //
         // });






  });
