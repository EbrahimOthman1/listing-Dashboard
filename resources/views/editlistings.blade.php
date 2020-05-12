@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Listings <a href="/Dashboard" class="btn btn-info btn-md float-right">Go back</a></div>
                <div class="card-body">

                  {!!Form::open(['action' => ['listingsController@update', $listings->id],'method' => 'POST'])!!}
                  <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text ('name',$listings->name,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                    {{Form::label('address', 'address')}}
                    {{Form::text ('address',$listings->address,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                    {{Form::label('website', 'website')}}
                    {{Form::text ('website',$listings->website,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                    {{Form::label('Email', 'Email')}}
                    {{Form::text ('email',$listings->email,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                    {{Form::label('phone', 'phone')}}
                    {{Form::text ('phone',$listings->phone,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                    {{Form::label('bio', 'bio')}}
                    {{Form::textarea('bio',$listings->bio,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                     {{Form::file('image')}}
                    </div>
                    <div>
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                   </div>
                    {{Form::hidden('_method','PUT')}}

                  {!!Form::close()!!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
