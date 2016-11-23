@extends('layout')


@section('content')

    @if (Session::has('message'))
        <p>{!! session('message') !!}</p>
    @endif



   <form action="admin/upload" method="post" enctype="multipart/form-data" >
       {{ csrf_field() }}
       <ul style="list-style:none;">
           <li>
               <input required="required" type="file" name="files[]" multiple >
           </li>
           <li>
               <input type="submit" value="ladda upp" >
           </li>
       </ul>
   </form>

    <hr>

    <div>
        <ul style="list-style:none;float: left;">
            @foreach($filesAlreadyUploaded as $f)
                <li style="float: left;">
                    <div style="margin:3px;padding: 20px 0;border: 1px solid #00b3ee;width: 310px;text-align: center;">
                        <img style="max-width: 300px;height:auto;" alt="{{ $f }}" title="{{ $f }}" src="img/{{ $f }}" >
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@stop