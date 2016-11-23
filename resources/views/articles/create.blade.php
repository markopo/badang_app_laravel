@extends('layout')


@section('content')

    <h2>Welcome articles create</h2>

    <hr />

    {!! Form::open() !!}
        <ul style="list-style:none;">
            <li>
                <div class="form-group">
                    {!! Form::label('name', 'Name', [ 'class' => 'form-label' ]) !!}
                    {!! Form::text('name', null, [ 'class' => 'form-control' ]) !!}
                </div>
            </li>
            <li>
                <div class="form-group">
                    {!! Form::label('body', 'Body', [ 'class' => 'form-label' ]) !!}
                    {!! Form::textArea('body', null, [ 'class' => 'form-control' ]) !!}
                </div>
            </li>
            <li>
                {!! Form::submit('Add Article', [ 'class' => 'btn btn-primary form-control' ]) !!}
            </li>
        </ul>


    {!! Form::close() !!}

@stop