@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row"
    <div class="col-md-10"
    <h3>List Data</h3>
  </div>
  <div class="col-sm-2">
    <a class="btn btn-sm btn-success" href="{{ route('data.create') }}">Create new Data
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{$message}}</p>
    </div>
  @endif

  <table class="table table-hover table-sm">
    <tr>
      <th width = "50px"><b>No.</b></th>
      <th width = "300px"><b>Name</b></th>
      <th>Description</th>
      <th width = "180px">Action</th>
    </tr>

    @foreach ($datas as $data)
    <tr>
      <td><b>{{++$i}}.</b></td>
      <td>{{$data->name}}</td>
      <td>{{$data->description}}</td>
      <td>
        <form action="{{ route('data.destroy', $data->id) }}" method="post">
          <a class="btn btn-sm btn-success" href="{{route('data.show', $data->id)}}">Show</a>
          <a class="btn btn-sm btn-warning" href="{{route('data.edit', $data->id)}}">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btnsm btn-danger">Delete</button>
          </form
        </td>
    </tr>
    @endforeach

  </table>
{!! $datas->links() !!}
</div>

@endsection
