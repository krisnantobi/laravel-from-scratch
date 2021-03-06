@extends('layouts.app')

@section('content')
<br>
<br>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2>Edit Post</h2>
        {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{ Form::submit('Save post', ['class' => 'btn btn-primary float-sm-right']) }}
            <br>
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                <div class="" style="color : red">{{$errors->first('title')}}</div>
                
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Body text') }}
                {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body text', 'id' => 'article-ckeditor']) }}
                <div class="" style="color : red">{{$errors->first('body')}}</div>
            </div>
            <div class="form-group">
                {{ Form::label('thumbnail', 'Thumbnail') }}<br>
                <img class="img-thumbnail " src="/storage/thumbnail/{{$post->thumbnail}}" alt="{{$post->thumbnail}}" style="width: 150px;"><br>
                {{ Form::file('thumbnail', ['placeholder' => 'Body text', 'id' => 'article-ckeditor']) }}
                <div class="" style="color : red">{{$errors->first('body')}}</div>
            </div>
        {{Form::hidden('_method', 'PUT')}}
        {!! Form::close() !!}
        <br>
        <button class="btn btn-danger float-sm-right" data-toggle="modal" data-target="#confirm-delete">
            Delete post
        </button>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="col-md-2"></div>
</div>




<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Delete confirmation
            </div>
            <div class="modal-footer">
                {!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST'])!!}
                    {{ Form::hidden('_method', 'DELETE')  }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger float-sm-right', 'data-toggle' => 'modal', 'data-target' => '#confirm-delete']) }}
                {!! Form::close() !!}
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

@endsection

