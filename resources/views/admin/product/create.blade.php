@extends('layouts.admin')
@section('title', "Admin Ürün Ekle")

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-container textarea,
        .form-container input[type="text"],
        .form-container input[type="file"],
        .form-container input[type="number"],
        .form-container select {
            width: 100%;
            padding: 5px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-container button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #243570;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .form-header p {
            font-size: 1.2em;
            color: #666;
        }
    </style>
@endsection

@section('content')
    <div class="main-content app-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-container">
                <div class="form-header">
                    <h1>Ürün Ekle</h1>
                    <p>Lütfen ürün ile ilgili bilgileri doldurunuz.</p>
                </div>
                <form action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Ürün Adı</label>
                        <input class="form-control" placeholder="Başlık giriniz." name="name" type="text" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Slug</label>
                        <input class="form-control" placeholder="Slug giriniz." name="slug" type="text" value="{{ old('slug') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Açıklama</label>
                        <textarea class="form-control" placeholder="Ürün açıklaması giriniz." name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Fiyat</label>
                        <input class="form-control" placeholder="Fiyat giriniz." type="text" name="price" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" id="category" name="category">
                            @foreach($main_categories as $main_category)
                                <option value="{{ $main_category->id }}" {{ old('category') == $main_category->id ? 'selected' : '' }}>{{ $main_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Ürün Resmi</label>
                        <input type="file" name="image"  data-height="200">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Durum</label>
                        <select name="status" class="form-control form-select" data-bs-placeholder="Select Status">
                            <option value="">Durum Belirleyiniz</option>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn ripple btn-primary">Ürün Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('admin/assets')}}/plugins/fileuploads/js/fileupload.js"></script>
    <script src="{{asset('admin/assets')}}/plugins/fileuploads/js/file-upload.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
