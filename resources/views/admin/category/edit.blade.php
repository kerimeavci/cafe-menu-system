@extends('layouts.admin')
@section('title', "Admin Kategori Düzenle")

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
                    <h1>Kategori Düzenle</h1>
                    <p>Lütfen Kategori ile ilgili bilgileri doldurunuz.</p>
                </div>
                <form action="{{ route('category', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Kategori Adı</label>
                        <input class="form-control"  name="name" type="text" value="{{ $categories->name }}">
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" id="category" name="category">
                            @foreach($main_categories as $main_category)
                                <option value="{{ $main_category->id }}" {{ old('category', $category->parent_id) == $main_category->id ? 'selected' : '' }}>
                                    {{ $main_category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Kategori Resmi</label>
                        <input
                            type="file" name="image" id="image" class="form-control-file" data-default-file="{{ $category->image ? asset('storage/' . $category->image) : '' }}">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="Kategori Resmi" class="img-thumbnail mt-2" style="width: 150px;">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Durum</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Pasif</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn ripple btn-primary">Kategori Değiştir</button>
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
        created() {
            this.fetchCategory();
        },
        methods: {
            handleFileUpload(event) {
                this.category.image = event.target.files[0];
            },
            fetchCategory() {
                axios.get(`/api/kategori/category/${this.$route.params.id}`)
                    .then(response => {
                        this.category = response.data;
                    })
                    .catch(error => {
                        console.error("Error fetching category:", error.response.data);
                    });
            },
            editCategory() {
                let formData = new FormData();
                formData.append("name", this.category.name);
                formData.append("status", this.category.status);
                if (this.category.image) {
                    formData.append("image", this.category.image);
                }

                axios.post(`/api/kategori/kategori-düzenle/${this.$route.params.id}`, formData)
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


