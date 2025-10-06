@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product_show.css') }}">
@endsection

@section('content')
<div class="product-form">
    <h2 class="breadcrumb">
        <a href="{{ route('products.index') }}">商品一覧</a> &gt; {{ $product->name }}
        </h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-body"> <!-- 横並び -->
            <!-- 画像 -->
            <div class="image-block">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}">
                <input type="file" name="image">
            </div>
            <div class="register-form__error-message">
                @if ($errors->has('image'))
                @foreach ($errors->get('image') as $message)
                <p class="register-form__error-message">{{$message}}</p>
                @endforeach
                @endif
            </div>

            <div class="info-block">
                <div class="form-group">
                    <label>商品名</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}">
                </div>
                <div class="register-form__error-message">
                @if ($errors->has('name'))
                @foreach ($errors->get('name') as $message)
                <p class="register-form__error-message">{{$message}}</p>
                @endforeach
                @endif
                </div>

                <div class="form-group">
                    <label>値段</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}">
                </div>
                <div class="register-form__error-message">
                @if ($errors->has('price'))
                @foreach ($errors->get('price') as $message)
                <p class="register-form__error-message">{{$message}}</p>
                @endforeach
                @endif
            </div>

            <div class="form-group">
                <label>季節</label>
                <div class="radio-group">
                @foreach (['春', '夏', '秋', '冬'] as $season)
                    <label>
                        <input type="radio" name="season" value="{{ $season }}"
                            {{ $product->season === $season ? 'checked' : '' }}> {{ $season }}
                    </label>
                @endforeach
                </div>
                <div class="register-form__error-message">
                @if ($errors->has('season'))
                <p class="register-form__error-message">{{$errors->first('season')}}</p>
                @endif
                </div>
            </div>
        </div>
    </div>

        <div class="form-group">
            <label>商品説明</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="register-form__error-message">
                @if ($errors->any())
                @foreach ($errors->all() as $message)
                <p class="register-form__error-message">{{ $message }}</p>
                @endforeach
                @endif
                </div>

        <div class="form-buttons">
            <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
            <button type="submit" class="btn-edit">変更を保存</button>
            <form action="{{ url('/products/' . $product->id . '/delete') }}" method="POST" style="display:inline;">
                @csrf
                <div class="trash-can-content">
                        <a href="/products/{{$product->id}}/delete">
                            <img src="{{ asset('/images/trash-can.png') }}" alt="ゴミ箱の画像" class="img-trash-can" />
                        </a>
                    </div>
            </form>
        </div>
    </form>
</div>
@endsection