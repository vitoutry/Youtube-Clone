@extends('home.dashboard')

@section('page.content')
	<form action="" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		@if($errors->has('url'))
			@foreach($errors->all() as $error)
				{{ $error }}
			@endforeach
		@endif

		<div class="form-group">
			<label for="">Url video</label>
			<input type="text" class="form-control" name="url" placeholder="Example: https://www.youtube.com/watch?v=F3JBn7ZCIHg" value="{{ Request::old('url') }}">
		</div>

		<div class="form-group">
			<label for="">Select your channel</label>
			<select name="channel" class="form-control channel-select">
				<option value="">Select your channel</option>
				@foreach($channels as $channel)
					<option value="{{ $channel->youtube_channel_id }}" @if($channel->youtube_channel_id == Request::old('channel')) selected @elseif($channel->youtube_channel_id == Session::get('current_auth')) selected @endif>{{ $channel->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Clone it!</button>
		</div>
	</form>
@endsection