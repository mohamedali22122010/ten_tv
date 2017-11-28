<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/sweetalert/dist/sweetalert.css")}}" rel="stylesheet" type="text/css" />

      <!-- iCheck for checkboxes and radio inputs -->
  	<link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/iCheck/all.css")}}">
  	<!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/plugins/select2/select2.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset("/bower_components/selectize/dist/css/selectize.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("/bower_components/selectize/dist/css/selectize.bootstrap3.css") }}" />

  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/plugins/datepicker/datepicker3.css')}}">

    <link href="{{ asset("admin/css/dropzone.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("admin/css/custom.css")}}" rel="stylesheet" type="text/css" />


    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-green-light.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-green-light">

<div class="wrapper">

    <!-- Header -->
    @include('backend.__partials.header')

    <!-- Sidebar -->
    @include('backend.__partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    	<!-- flash message -->
    	@if ($errors && !empty($errors->all()))
			<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-danger"></i> Alert!</h4>
	            @foreach($errors->all() as $error)
	            	{{ $error }}
	        	@endforeach
			</div>
		@endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            @yield('content-header')
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

   <!-- Footer -->
    @include('backend.__partials.footer')

</div><!-- ./wrapper -->
        
    
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js")}}"></script>
<!-- FastClick -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/sweetalert/dist/sweetalert.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/admin/js/dropzone.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/parsleyjs/dist/parsley.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("/bower_components/selectize/dist/js/standalone/selectize.min.js") }}"></script>

<script src="{{ asset ("/admin/js/backend.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/admin/js/customScript.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/jquery/dist/jquery-ui.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/admin/js/parsley.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/select2/select2.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/iCheck/icheck.min.js") }}"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/chartjs/Chart.min.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

<script src="{{asset("/bower_components/AdminLTE/plugins/morris/morris.min.js")}}"></script>
<!-- Sparkline -->
<script src="{{asset("/bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js")}}"></script>
<!-- jvectormap -->
<script src="{{asset("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
<script src="{{asset("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset("/bower_components/AdminLTE/plugins/knob/jquery.knob.js")}}"></script>
<!-- daterangepicker -->
<script src="{{asset("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js")}}"></script>
<!-- datepicker -->
<script src="{{asset("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js")}}"></script>
<script src="{{asset("/bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js")}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<!-- DataTables -->
<script src="{{asset("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>

    @yield('scripts')
    <script>
    	(function() {
	    	if ($('.dropzone').length) {
			    var filenames=new Array;
		        var removedImages= new Array;
		        var queuecomplete;
		        var ImageRequired = true;
		        var addedImage=false;
		        if (typeof customFieldImage === 'undefined') {
				    customFieldImage = "Primary";
				}
		        if (typeof maxFiles === 'undefined') {
				    maxFiles = 1;
				}
				if (typeof ImageNotRequired !== 'undefined') {
				    ImageRequired = false;
				}
				if (typeof ImageMustHasPrimary === 'undefined') {
				    ImageMustHasPrimary = false;
				}
		
		        Dropzone.autoDiscover = false;
		        var uploadDropZone=new Dropzone (".dropzone",{
		            url: "{{ route('image.upload') }}",
		            acceptedFiles:"image/*",
		            addRemoveLinks: true,
		            maxFiles : maxFiles,
		            @if( Request::route()->getName() =='backend.slider.create' || Request::route()->getName() =='backend.slider.edit')
			        accept: function(file, done) {
			            file.acceptDimensions = done;
			            file.rejectDimensions = function() { done("Image width must equal 1170 and height equal 560"); };
		        	}
		        	@elseif(Request::route()->getName() == 'backend.categories.create' || Request::route()->getName() =='backend.categories.edit')
		        	accept: function(file, done) {
			            file.acceptDimensions = done;
			            file.rejectDimensions = function() { done("Image width must equal 570 and height equal 320"); };
		        	}
		        	@endif

		        });
		       @if( Request::route()->getName() =='backend.slider.create' || Request::route()->getName() =='backend.slider.edit' )
		         uploadDropZone.on('thumbnail',function(file){
		            /*if(file.width != 1170 && file.height != 560){
		            	file.rejectDimensions()
		            }else{
		            	file.acceptDimensions();
		            }*/
		           file.acceptDimensions();
		        });
		        @elseif(Request::route()->getName() == 'backend.categories.create' || Request::route()->getName() =='backend.categories.edit')
		         uploadDropZone.on('thumbnail',function(file){
		            if(file.width != 570 && file.height != 320){
		            	file.rejectDimensions()
		            }else{
		            	file.acceptDimensions();
		            }
		        });
		        @endif
		
		        uploadDropZone.on('addedfile',function(file){
		            ImageRequired = false;
		            queuecomplete=false;
		            addedImage=true;
		        });
		        uploadDropZone.on('removedfile',function(file){
		            index=filenames.indexOf(file.name);
		            $("input[rel='"+file.name+"']").remove();
		            if(index != -1)
		            {
		                filenames.splice(index,1);
		            }
		            if(filenames.length == 0 ){
		            	if (typeof ImageNotRequired !== 'undefined') {
						    ImageRequired = false;
						}else{
							ImageRequired = true;
						}
		            }
		
		        });
		        uploadDropZone.on('sending',function(file, xhr, formData){
		            formData.append("_token", "{{ csrf_token() }}");
		        });
		        uploadDropZone.on('success',function(file, response) {
		            filenames.push(response.filename);
		            var url="{{ route('backend.home') }}/image/"+response.filename;
		            var urlInput='<input rel="'+response.filename+'" type="hidden" name="urls[]" value="'+ url +'" />';
		            $('.form-inputs').append(urlInput);
		            (function(){
		            	if(maxFiles > 1){
		            		$(file.previewElement).append('<a href="#" class="makePrimary">Make '+customFieldImage+'</a>');
							makePrimaryImage(response.filename);
		            	}else{
		            		var main_image='<span class="main_media_image" rel="'+response.filename+'" ></span>';
			            	$('.form-inputs').append(main_image);
		            	}
					})();
		        });
		        uploadDropZone.on('queuecomplete',function(files){
		            queuecomplete=true;
		            
		        });
		        $('.form-inputs').parsley().on('form:submit',(function(e)
		        {
		            // e.stopImmediatePropagation();
		            @if(Request::segment(4) !='edit')
		            if(ImageRequired){
		                sweetAlert('Oops...','you must upload image to submit this record','error');
		                return false;
		            }
		            @else
		                if($('.imagesBlock ul li').length==0 && ImageRequired){
		
		                    sweetAlert('Oops...','you must upload image to submit this record','error');
		                    return false;
		                }
		            @endif
		            if(!queuecomplete && addedImage){
		                sweetAlert('Oops...','You Cannot submit till finishing upload','error');
		                return false;
		            }
		            if($(".main_media_image").length==0 && maxFiles > 1 && ImageMustHasPrimary){
		            	sweetAlert('Oops...','Please Set '+customFieldImage+' image first','error');
		                return false;
		            }
		            // filenames.forEach(function( entry ){
		            //     var url="{{ route('backend.home') }}/image/"+entry;
		            //     var urlInput='<input type="hidden" name="urls[]" value="'+ url +'" />';
		            //     $('.form-inputs').append(urlInput);
		            // });
		        }));
			}
        })();
        //DropZone
        $("div.imagesBlock ul li div a.removeMedia").on("click", function(event) {
	        var removedImages='<input type="hidden" name="removedImages[]" value="'+ $(this).data('key') +'" />';
	        $('.form-inputs').append(removedImages);
	        event.preventDefault();
	        $(this).parents("li").remove();
        });
        //Delete image
        function makePrimaryImage(filename){
        	$("a.makePrimary").on("click", function(event) {
		       	event.preventDefault();
		       	var main_image='<input class="main_media_image" rel="'+filename+'" type="hidden" name="main_image" value="'+ filename +'" />';
	        	$('.form-inputs').append(main_image);
	        	$("a.makePrimary").show();
	        	$(this).hide();
	        	
	        });
        }
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    	if($('.ckEditor').length > 0){
	    	//$('.ckEditor').each( function () {
		        $('.ckEditor').summernote({
			        height: 300
		        });
		    //});
	    
	   }

		$(".select2").select2();
		$('.datepicker').datepicker({
	      autoclose: true,
	      format: "yyyy-mm-dd",
	      assumeNearbyYear:"20",
	      todayBtn: true,
	      todayHighlight: true,
	    });
	    
	    //Timepicker
	    $('.timepicker').timepicker({
	        showInputs: false,
	        minuteStep: 15,
	        showMeridian: false
	    })
	    
    });
  	</script>

</body>

</html>