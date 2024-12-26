@extends('layouts.admin')
@section('pagetitle', "Admin Ürünler")
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
                            <li class="breadcrumb-item active" aria-current="page">Ürünler</li>
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">ÜRÜNLER</h6>
                                </div>
                                <div class="table-responsive  export-table">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom" >
                                        <thead>
                                        <tr>
                                            <th>Ürün Adı</th>
                                            <th>Açıklama</th>
                                            <th>Ürün Fiyatı</th>
                                            <th>Durum</th>
                                            <th>Ürün Fotoğrafı</th>
                                            <th>Ürün Düzenle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $count = 1; @endphp
                                        @foreach ($products as $pro)
                                            <tr>
                                                <td>{{ $pro->name }}</td>
                                                <td>{{ $pro->description }}</td>
                                                <td>{{ $pro->price }}</td>
                                                <td>{{ $pro->status }}</td>
                                                <td>
                                                    <div class="masonry row">
                                                        <div class="brick" style="width: 200px!important;">
                                                            <a href="{{ asset('/'. $pro->image) }}" class="js-img-viewer" data-caption="{{$pro->image}}"
                                                               data-id="lion">
                                                                <img src="{{ asset('/'. $pro->image) }}" alt="Biography Image" style="width: 100%; height: 150px; object-fit: cover; display: block;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{route('product_edit',['id'=>$pro->id])}}" class="btn btn-primary"  data-bs-original-title="Düzenle">
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
