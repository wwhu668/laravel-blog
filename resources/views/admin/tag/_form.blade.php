    {!! Form::hidden('user_id', Auth::user()->id) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:')!!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>

