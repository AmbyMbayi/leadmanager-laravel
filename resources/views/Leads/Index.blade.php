@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel Lead Manager</h2>
        </div>
        <div class="pull-right">
            <a href="{{route('leads.create')}}" class="btn btn-success" title="create a lead"><i
                    class="fas fa-plus-circle"></i></a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>

@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Introduction</th>
        <th>Location</th>
        <th>Cost</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($leads as $lead)
    <tr>
        <td>{{++$i}}</td>
        <td>{{$lead->name}}</td>
        <td>{{$lead->introduction}}</td>
        <td>{{$lead->location}}</td>
        <td>{{$lead->cost}}</td>
        <td>{{date_format($lead->created_at, 'jS M Y')}}</td>
        <td>
            <form action="{{route('leads.destroy', $lead->id)}}" method="POST">
                <a href="{{route('leads.show', $lead->id)}}" title="show">
                    <i class="fas fa-eye text-success fa-lg"></i></a>
                <a href="{{route('leads.edit', $lead->id)}}"><i class="fas fa-edit fa-lg"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" title="delete" style="border:none; background-color: transparent;">
                    <i class="fas fa-trash fa-lg text-danger"></i></button>
            </form>
        </td>

    </tr>
    @endforeach
</table>
{!! $leads->links()!!}
@endsection