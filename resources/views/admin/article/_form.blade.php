    {!! Form::hidden('user_id', Auth::user()->id) !!}
    <div class="form-group">
        {!! Form::label('title', '标题:')!!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('intro', '关键字:')!!}
        {!! Form::text('intro', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('excerpt', '描述:')!!}
        {!! Form::text('excerpt', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','选择分类') !!}
        {!! Form::select('category_id',$categorys,null,['class'=>'form-control js-example-basic-single']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('published_at', '发布时间:') !!}
        @if (empty($article))
            {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
        @else   
            {!! Form::input('date', 'published_at', $article->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('tag_list','选择标签') !!}
        {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
    </div>

    <div class="form-group editor">
        {!! Form::label('body', '内容:')!!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'myEditor' ]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>

