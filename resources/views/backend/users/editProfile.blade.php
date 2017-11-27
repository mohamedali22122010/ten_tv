@extends('layouts.backend',['page_title'=>trans('backend.Edit My Profile')])
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form  class="form-inputs" id="profile-form" action="{{ route('profile.edit') }}" data-parsley-validate="true" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="nav-tabs-custom">
						<div class="tab-content">
							
							<div class="form-group row">
						        <div class="col-lg-6">
									<label>{{trans('backend.Name')}}</label>
									<input class="form-control" name="name" type="text" data-parsley-required="true" value="{{old('name',$profile->name)}}" placeholder="" >
						        </div>
						        <div class="col-lg-6">
									<label>{{trans('backend.Phone')}}</label>
									<input class="form-control" name="phone" type="text" data-parsley-required="false" value="{{old('phone',$profile->phone)}}" placeholder="" >
						        </div>
							</div>
							
							<div class="form-group">
								<label>{{trans('backend.Email')}}</label>
								<input class="form-control" name="email" type="text" data-parsley-required="true" value="{{old('email',$profile->email)}}" placeholder="" >
							</div>
							
							@if($profile->role_id == 3)
							<div class="form-group">
								<label>{{trans('backend.Specification')}}</label>
								<input class="form-control" name="specification" type="text" value="{{old('specification',$profile->specification)}}" placeholder="" >
							</div>
							@endif
							
							<div class="form-group row">
						        <div class="col-lg-6">
									<label>{{trans('backend.Password')}}</label>
									<input class="form-control" name="password" type="password" data-parsley-required="false" placeholder="" >
						        </div>
						        <div class="col-lg-6">
									<label>{{trans('backend.Password Confirmation')}}</label>
									<input class="form-control" name="password_confirmation" type="password" data-parsley-required="false" placeholder="" >
						        </div>
							</div>
							
							<div class="form-group row">
						        <div class="col-lg-6">
									<label>{{trans('backend.Facebook Link')}}</label>
									<input class="form-control" name="social_media[facebook]" type="text" data-parsley-required="false" value="{{old('social_media.facebook',$profile->social_media['facebook'])}}" placeholder="" >
						        </div>
						        <div class="col-lg-6">
									<label>{{trans('backend.Twitter Link')}}</label>
									<input class="form-control" name="social_media[twitter]" type="text" data-parsley-required="false" value="{{old('social_media.twitter',$profile->social_media['twitter'])}}" placeholder="" >
						        </div>
							</div>
							
							<div class="form-group row">
						        <div class="col-lg-6">
									<label>{{trans('backend.Instagram Link')}}</label>
									<input class="form-control" name="social_media[instagram]" type="text" data-parsley-required="false" value="{{old('social_media[instagram]',$profile->social_media['instagram'])}}" placeholder="" >
						        </div>
						        <div class="col-lg-6">
									<label>{{trans('backend.LinkedIn Link')}}</label>
									<input class="form-control" name="social_media[linkedin]" type="text" data-parsley-required="false" value="{{old('social_media[linkedin]',$profile->social_media['linkedin'])}}" placeholder="" >
						        </div>
							</div>
							
							<div class="form-group row">
						        <div class="col-lg-6">
									<label>{{trans('backend.Goole Plus Link')}}</label>
									<input class="form-control" name="social_media[google_plus]" type="text" data-parsley-required="false" value="{{old('social_media[google_plus]',$profile->social_media['google_plus'])}}" placeholder="" >
						        </div>
						        <div class="col-lg-6">
									<label>{{trans('backend.youtube')}}</label>
									<input class="form-control" name="social_media[youtube]" type="text" data-parsley-required="false" value="{{old('social_media[youtube]',$profile->social_media['youtube'])}}" placeholder="" >
						        </div>
							</div>
							
					        @if($profile->role_id == 4)
								<div class="form-group">
					                <label> {{trans('backend.Doctors')}}</label>
					                <select class="form-control select2" data-parsley-required="false" name="doctors[]"  multiple="multiple" style="width: 100%">
					                    @if($doctorsArray && !empty($doctorsArray))
					                        @foreach($doctorsArray as $id=>$value)
				                            @if(in_array($id,$doctorsIDs))
				    	                        <option selected="selected" value="{{$id}}">{{$value}}</option>
				                            @else
				                                <option  value="{{$id}}">{{$value}}</option>
				                            @endif
					                        @endforeach
					                    @endif
					                </select>
				                </div>
				                <div class="form-group">
					                <label> {{trans('backend.Companies')}}</label>
					                <select class="form-control select2" data-parsley-required="false" name="companies[]"  multiple="multiple" style="width: 100%">
					                    @if($companiesArray && !empty($companiesArray))
					                        @foreach($companiesArray as $id=>$value)
				                            @if(in_array($id,$companiesIDs))
				    	                        <option selected="selected" value="{{$id}}">{{$value}}</option>
				                            @else
				                                <option  value="{{$id}}">{{$value}}</option>
				                            @endif
					                        @endforeach
					                    @endif
					                </select>
				                </div>
			                @endif
							@if($profile->role_id == 3 || $profile->role_id == 5)
								<div class="form-group">
					                <label> {{trans('backend.Hospitals')}}</label>
					                <select class="form-control select2" data-parsley-required="false" name="hospitals[]"  multiple="multiple" style="width: 100%">
					                    @if($hospitalsArray && !empty($hospitalsArray))
					                        @foreach($hospitalsArray as $id=>$value)
				                            @if(in_array($id,$hospitalsIDs))
				    	                        <option selected="selected" value="{{$id}}">{{$value}}</option>
				                            @else
				                                <option  value="{{$id}}">{{$value}}</option>
				                            @endif
					                        @endforeach
					                    @endif
					                </select>
				                </div>
			                @endif
			                
			                <div class="imagesBlock row">
					            <ul>
					                @foreach($profile->getMedia('images') as $key => $image)
					                <li class="col-md-3">
					                	<div>
					                		<div class="actions">
					                			<a class="removeMedia" data-key="{{$key}}">X</a>
					            			</div>
					            			<img src="{{ $image->getUrl() }}"  alt="Image">
					        			</div>
					    			</li>
					                @endforeach
					            </ul>
					        </div>
					        <!-- imagesBlock -->
							<label class="lowMargin">
								<span>{{trans('backend.profile image')}}</span>
								  <code>( {{trans('backend.Image width prefered to be with ratio (1:1)')}} )</code>
							</label>
							
							<div class="dropzone form-group"></div>
							
							<div class="form-group">
								<label>{{trans('backend.Profile Description')}}</label>
								<textarea class="form-control tinymceText" name="about" id="about" placeholder="">{{old('about',$profile->about)}}</textarea>
							</div>
							
							<div class="submit">
					            <input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="{{trans('backend.Submit')}}">
							</div>
						</div>
						<!-- tab-3 -->
					</div>
					<!-- formTabs -->
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop


@section('scripts')
<script type="text/javascript">

maxFiles = 1; // max images to upload
ImageNotRequired = true;

</script>

@stop