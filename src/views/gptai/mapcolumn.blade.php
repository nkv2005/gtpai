@extends('zeemo.gptai.app')
@section('content')
<hr>
    <h4>Map Field : </h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
            	<th>Tag Field Name</th>
                <th>Response Field Name</th>
                <th>Action</th>
            </tr>
        </thead>
     <form method="POST" action="{{ route('mapfield.store') }}">
        <tr>
        	<td>
             <select class="form-control m-bot15" name="tag_gpt_name">		          
		           @foreach($allTablesNameWithColumn as $tablekey=>$table)
		                
		                 <optgroup label="{{$tablekey}}">
		                 	 @foreach($table as $columname)
                               <option value="{{$tablekey}}-{{$columname}}">{{$columname}}</option>
		                 	 @endForeach
		                 </optgroup>
		                 
		           @endForeach
              </select>
        	</td>
        	<td>
        		<select class="form-control m-bot15" name="response_gpt_name">
        			@foreach($allTablesNameWithColumn as $tablekey=>$table)
		                
		                 <optgroup label="{{$tablekey}}">
		                 	 @foreach($table as $columname)
                               <option value="{{$tablekey}}-{{$columname}}">{{$columname}}</option>
		                 	 @endForeach
		                 </optgroup>
		                 
		           @endForeach
                </select></td>
        	<td> <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">{{ $submit }}</button>
            </div>
        		
        	</td>
        </tr>
         </form>

    </table>

    <table class="table table-bordered table-striped">
            <tr>
            	<th>Tag Field Name</th>
                <th>Response Field Name</th>
                <th>Action</th>
            </tr>
             @foreach($DatabaseMeta as $dbcolumn)
              <tr>
                    <td>{{ $dbcolumn->tag_gpt_name }}</td>
                    <td>{{ $dbcolumn->response_gpt_name }}</td>
                    <td>
                        <form method="POST" action="{{ route('mapfield.destroy', $dbcolumn->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class='btn-group'>
                                
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach

    </table>

@endsection

