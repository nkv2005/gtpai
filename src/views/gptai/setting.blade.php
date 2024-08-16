@extends('zeemo.gptai.app')
@section('content')
        <h3>Edit : </h3>
   <form method="POST" action="{{ route('setting') }}">
           
        @csrf
        <div class="form-inline">              
           <div class="form-group">
                Api key provided by zeemo server : <input type="text" name="chatapikey" class="form-control" value="{{ isset($setting) ? $setting->chatapikey : '' }}">
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">{{ $submit }}</button>
            </div>
        </div>
    </form>    

@endsection