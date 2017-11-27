@if($errors->has($name))
	@foreach($errors->get($name) as $error)
		<p class="error">{{ $error }}</p>
	@endforeach
@endif