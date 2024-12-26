
@extends('layouts.admin')
@section('pagetitle', "Admin Kategoriler")
@section('css')

@endsection
@section('content')
    <div class="page">
        <div class="main-content app-content">
            <!-- row  -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- container -->
            <div class="main-container container-fluid">
                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kategoriler</li>
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Kategoriler</h6>
                                </div>
                                <div class="table-responsive  export-table">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom" >
                                        <thead>
                                        <tr>
                                            <th>Kategori Adı</th>
                                            <th>Durum</th>
                                            <th>Kategori Fotoğrafı</th>
                                            <th>Kategori Düzenle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->status }}</td>
                                                <td>
                                                    <div class="masonry row">
                                                        <div class="brick" style="width: 200px!important;">
                                                            <a href="{{ asset('/'. $category->image) }}" class="js-img-viewer" data-caption="{{$category->image}}"
                                                               data-id="lion">
                                                                <img src="{{ asset('/'. $category->image) }}" alt="Biography Image" style="width: 100%; height: 150px; object-fit: cover; display: block;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('categories_edit', ['id' => $category->id]) }}" class="btn btn-success">
                                                        <i class="bi bi-pencil"></i> Düzenle
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- smart photo master js -->
    <script src="{{asset('admin/assets')}}/plugins/SmartPhoto-master/smartphoto.js"></script>
    <script src="{{asset('admin/assets')}}/js/gallery.js"></script>
@endsection
