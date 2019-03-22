// $(function(){
//     var inDexValue;
    
//       $('button').click( function() {
//         if($('#comment').val().length == ''){
//          alert('Please Enter Your Comment');
//          return true;
//         }
//         var userCmnt = $('#comment').val();
//         if($('#submit').hasClass('editNow')){
                   
//           $('#cmntContr>div.viewCmnt').eq(inDexValue).children('p').html(userCmnt);
          
//         }else{      
      
//       $('#cmntContr').append("<div class='viewCmnt'><p>"+ userCmnt + "</p><span class='edit'></span><span class='delete'></span></div>");
//        }
//         $('#comment').val('');
//         $(this).removeClass('editNow');
//     });
      
//     // Delete 
//     $('#cmntContr').on('click', '.delete', function(){   
//       confirm("Delete Coformation");
//       $(this).parent().remove();
//     });
//     // Edit
//     $('#cmntContr').on('click', '.edit', function(){
     
//       var toEdit = $(this).prev('p').html();
//       //alert(toEdit);
//       $('#comment').val(toEdit);
//       $('input').addClass('editNow');
//       inDexValue = $(this).parent('div.viewCmnt').index();
      
//     });
//     });
  