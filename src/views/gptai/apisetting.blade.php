@extends('zeemo.gptai.app')
@section('content')
        <h3>Create Api user and token Key : </h3>
   <form method="POST" action="registerapiuser">
           
        @csrf
        <div class="form-inline">              
            <div class="form-group">
               Name : <input type="text" name="username" class="form-control" value="">
            </div>
            <div class="form-group">
               Email : <input type="text" name="email" class="form-control" value="">
            </div>
            <div class="form-group">
               Password : <input type="text" name="password" class="form-control" value="">
            </div>
            <div class="form-group">
              Confirm Password : <input type="text" name="c_password" class="form-control" value="">
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">{{ $submit }}</button>
            </div>
        </div>
    </form>

     <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Token</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alluserdetails as $userdetail)
                <tr>
                    <td>{{$userdetail->name}}</td>
                    <td style="width:50px;">
                        <input type="text" readonly value=" {{$userdetail->token}}"></div>
                    </td>
                    <td>
                        <a href="{{ route('registerapidelete.delete', $userdetail->id) }}" class='btn btn-default btn-xs'>
                          <i class="glyphicon glyphicon-trash">Delete</i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form method="post" action="traineddata">
        <input type="submit" name="traineddata" value="Create Json Data for Chat" />
    </form>
@endsection
