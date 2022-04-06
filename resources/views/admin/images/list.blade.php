@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                @include('admin.includes.message')

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Képek') }}</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Képek') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Kattintson a kép melletti szerkesztés gombra') }}</h3>

                                <div class="card-tools">

                                    {{ $images->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th style="width: 40px;">Id</th>
                                            <th style="width: 100px;">Kép</th>
                                            <th>Név</th>
                                            <th style="width: 80px;">Művelet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($images as $img)
                                            <tr>
                                                <td>{{ $img->id }}.</td>
                                                <td><img src="{{ url('/storage/' . $img->file) }}" alt="" height="50"></td>
                                                <td>{{ $img->title }} </td>

                                                <form action="{{ route('admin.images.delete', $img->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <td class="d-flex flex-nowrap" style="gap: 1rem">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.images.edit-view', [
                                                                'image' => $img->id,
                                                            ]) }}">Szerkesztés</a>
                                                        <button class="btn btn-danger">X</button>
                                                    </td>
                                                </form>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
