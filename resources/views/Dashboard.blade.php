@extends('layouts.app')
<!-- https://images.assetsdelivery.com/compings_v2/2nix/2nix1408/2nix140800145.jpg -->
@section('content')
<style>
img {
  border-radius: 50%;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard<span class="float-right"><a href="/listings/create" class="btn btn-success btn-xs">Add Listing</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <h1>Your listings</h1> -->
                    @if(count($listings))

                    <table class="table table-striped">
                      <tr>
                      <th>Company</th>
                      <th></th>
                      <th></th>
                      </tr>
                      @foreach ($listings as $listing)
                      <div class="circular--portrait">
                          <img src="{{$listing->image}}" style="width:150px">
                      </div>
                      <tr>
                         <td>{{$listing->name}}</td>
                         <br>
                         <td><a class="btn btn-info float-right" href="/listings/{{$listing->id}}/edit">Edit</a> </td>
                         <td>
                           {!!Form::open(['action' => ['listingsController@destroy', $listing->id],'method' => 'POST' , 'class' =>'float-left','onsubmit'=> 'return confirm("Are You Sure")'])!!}
                             <div>
                             {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
                            </div>
                             {{Form::hidden('_method','DELETE')}}
                             {!!Form::close()!!}
                         </td>
                      </tr>
                      @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
