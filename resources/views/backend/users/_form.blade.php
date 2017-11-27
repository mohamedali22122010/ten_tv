
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
        <label> Name</label>
        <input class="form-control" name="name" value="{{ old('name',$user->name) }}" type="text" data-parsley-required="true"  placeholder="Input Placeholder Goes Here ..." data-parsley-required="true" data-parsley-error-message="This field is required">    
</div>
<div class="form-group">
        <label> Email</label>
        <input class="form-control" name="email" value="{{ old('email',$user->email) }}" type="email" data-parsley-required="true"  placeholder="Input Placeholder Goes Here ..." data-parsley-required="true" data-parsley-error-message="This field is required">  
</div>
<div class="form-group">
        <label> Password</label>
        <input class="form-control" name="password" value="" type="password" data-parsley-required="true"  placeholder="Input Placeholder Goes Here ..." data-parsley-required="true" data-parsley-error-message="This field is required">  
</div>
<div class="form-group">
        <label> Password Confirmation</label>
        <input class="form-control" name="password_confirmation" value="" type="password" data-parsley-required="true"  placeholder="Input Placeholder Goes Here ..." data-parsley-required="true" data-parsley-error-message="This field is required">  
</div>
<div class="submit">
    <input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="Submit">
</div>