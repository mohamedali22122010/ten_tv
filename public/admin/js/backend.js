$(function () {
   $('.delete').on('click', function (e) {
      var deleteData = $(this);
      swal({title: "هل انت متأكد ؟",
         text: "لا يمكنك التراجع عن الحذف بعض الضغط على رز نعم !",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD4140",
         closeOnConfirm: false,
         showLoaderOnConfirm: true,
      },
      function(){

         deleteDataAjax($(deleteData).data('action'),
                        $(deleteData).data('csrf'),
                        $(deleteData).data('id'));
      });
      e.preventDefault();
   });

   function deleteDataAjax(action,csrf,id)
   {
      $.ajax({
         url: action ,
         type: 'DELETE',
         data: { _token: csrf},
         success: function(data){
            if(data==true){
               //$('tr#'+id).remove();
               if (typeof table === 'undefined') {
           			$('tr#'+id).remove();
               }else{
               		table.row('#'+id).remove().draw( false ); // this line when use data table only
               }
               swal("تم المسح!", "تم المسح بنجاح.","success");
            } else {
               swal("خطأ!", "خطأ عند محاولة المسح.","error");
            }
         },
         error:function(){
            swal("خطأ!", "خطأ عند محاولة المسح.","error");
         },
      });
   }
   
   $("#deleteAll-action").click(function(e){
   		e.preventDefault();
   		checkbox = $(".bulk-action-checkbox:checked");
   		if(checkbox.length > 0){
	      swal({title: "هل انت متأكد ؟",
	         text: "لا يمكنك التراجع عن الحذف بعض الضغط على رز نعم !",
	         type: "warning",
	         showCancelButton: true,
	         confirmButtonColor: "#DD4140",
	         closeOnConfirm: false,
	         showLoaderOnConfirm: true,
	      },
	      function(){
			checkbox.each(function(){
   				deleteDataAjax($(this).data('delete'),$(this).data('csrf'),$(this).data('id'));
   			});
	      });
   		}
   		if(checkbox.length == 0){
   			swal("خطأ!", "من فضلك قم باختيار على الاقل خيار واحد للمسح","error");
   		}

   });
   
   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
   
});
