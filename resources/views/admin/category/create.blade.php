@extends('layouts.admin')
@section('title', "Admin Kategori Ekle")

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
            <div class="form-container">
                <div class="form-header">
                    <h1>Kategori Ekle</h1>
                    <p>Lütfen Kategori ile ilgili bilgileri doldurunuz.</p>
                </div>
                <form action="{{ route('categories_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Kategori Adı</label>
                        <input class="form-control" placeholder="Başlık giriniz." name="name" type="text" value="{{ old('name') }}">
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
                        <label for="image">Kategori Resmi</label>
                        <input type="file" name="image" class="dropify" data-height="200">
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
                        <button type="submit" class="btn ripple btn-primary">Kategori Ekle</button>
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
    <script>
        import axios from "axios";

        export default {
            data() {
                return {
                    category: {
                        name: '',
                        status: '',
                        image: null
                    }
                };
            },
            methods: {
                handleFileUpload(event) {
                    this.category.image = event.target.files[0];
                },
                createCategory() {
                    let formData = new FormData();
                    formData.append("name", this.category.name);
                    formData.append("status", this.category.status);
                    if (this.category.image) {
                        formData.append("image", this.category.image);
                    }

                    axios.post('/api/kategori/kategori-ekle', formData)
                        .then(response => {
                            alert(response.data.message);
                        })
                        .catch(error => {
                            console.error("Error:", error.response.data);
                        });
                }
            }
        };
    </script>

@endsection

