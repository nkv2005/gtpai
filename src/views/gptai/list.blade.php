@extends('zeemo.gptai.app')
@section('content')
    @if(isset($task))
        <h3>Edit : </h3>
        <form method="POST" action="{{ route('task.update', $task->id) }}">
            @method('PATCH')
    @else
        <h3>Add Pattern : </h3>
   <form method="POST" action="{{ route('task.store') }}">
    @endif
        @csrf
        <div class="form-inline">              
           <div class="form-group">
                Patterns : <input type="text" name="name" class="form-control" value="{{ isset($task) ? $task->name : '' }}">
                (Ex: Tell me about %fieldname%)
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">{{ $submit }}</button>
            </div>
        </div>
    </form>
    <hr>
    <h4>Pattern : </h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Pattern</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>
                        <form method="POST" action="{{ route('task.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class='btn-group'>
                                <a href="{{ route('task.edit', $task->id) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

<div id="chatwindow">
    <div class="chatbox"><div class="chatbox__support">
        <div class="chatbox__header"><div class="chatbox__image--header"><picture><source type="image/webp" srcset="http://zeemolocaldemo81.au/zeemocms4niraj/public/images/chatgpt/circled-user-female-skin-type-5--v1.png"><source type="image/png" srcset="http://zeemolocaldemo81.au/zeemocms4niraj/public/images/chatgpt/circled-user-female-skin-type-5--v1.png"><img src="http://zeemolocaldemo81.au/zeemocms4niraj/public/images/chatgpt/circled-user-female-skin-type-5--v1.png" alt="image"></picture></div><div class="chatbox__content--header"><h4 class="chatbox__heading--header">Chat support</h4><p class="chatbox__description--header">Hi, How can I help you?</p></div></div><div class="welcometext"><p> Ntees want to help you</p><div class="catbox" id=""></div></div><div class="chatbox__messages" id="chatboxmessage"></div><div class="chatbox__footer"><input type="text" placeholder="Write a message..." id="chatboxtext"><button class="chatbox__send--footer send__button">Send</button></div></div><div class="chatbox__button"><button><img src="http://zeemolocaldemo81.au/zeemocms4niraj/public/images/chatgpt/chatbox-icon.svg"></button></div></div></div>



<link rel="stylesheet" href="http://localhost:5000/static/style.css" />
<script type="text/javascript" src="http://localhost:5000/static/createchat.js"></script>
<script>

chatinit('ntees');
</script>
@endsection