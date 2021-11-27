@extends('layouts.admin')

@section('title', 'Slider')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Slider</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Slider</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Slider</h4>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($sliders) > 0)
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td><img src="{{ asset('uploads/sliders/' . $slider->image) }}" width="100"
                                                alt=""></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#exampleModal{{ $slider->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $slider->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Slider
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure, you want to delete this slider?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('admin.slider.delete', $slider->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="btn btn-primary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">No Data Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
