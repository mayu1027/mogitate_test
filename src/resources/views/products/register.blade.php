@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
@endsection

@section('link')
<

@section('content')
<div class="register-form">
    <h2 class="register-form__heading content__heading">商品登録</h2>
    <div class="register-form__inner">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="register-form__group register-form__name-group">
            <label class="register-form__label" for="name">商品名<span class="register-form__required">必須</span>
            </label>
            <div class="register-form__name-input">
                <input class="register-form__input register-form__name-input" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="商品名を入力">
            </div>
            <div class="register-form__error-message">
                @if ($errors->has('name'))
                <p class="register-form__error-message">{{$errors->first('name')}}</p>
                @endif
            </div>
        </div>

        <div class="register-form__group">
            <label class="register-form__label" for="price">値段<span class="register-form__required">必須</span>
            </label>
            <div class="register-form__price-input">
                <input class="register-form__input register-form__price-input" type="number" name="price" id="price" value="{{ old('price') }}" placeholder="値段を入力">
            </div>
            <div class="register-form__error-message">
                @if ($errors->has('price'))
                <p class="register-form__error-message">{{$errors->first('price')}}</p>
                @endif
            </div>
        </div>

        <div class="register-form__group">
            <label class="register-form__label" for="image">商品画像<span class="register-form__required">必須</span>
            </label>
            <div class="register-form__image-input">
                <input class="register-form__image-input register-form__image-input" type="file" name="image" id="image" accept="image/*">
            </div>
            <div class="register-form__error-message">
                @if ($errors->has('image'))
                <p class="register-form__error-message">{{$errors->first('image')}}</p>
                @endif
            </div>
        </div>

        <div class="register-form__group">
            <label class="register-form__label">季節<span class="register-form__required">必須</span>
            </label>
            <div class="register-form__season-input">
            <label><input type="radio" name="season" value="spring" {{ old('season') == 'spring' ? 'checked' : '' }}> 春</label>
            <label><input type="radio" name="season" value="summer" {{ old('season') == 'summer' ? 'checked' : '' }}> 夏</label>
            <label><input type="radio" name="season" value="autumn" {{ old('season') == 'autumn' ? 'checked' : '' }}> 秋</label>
            <label><input type="radio" name="season" value="winter" {{ old('season') == 'winter' ? 'checked' : '' }}> 冬</label>
            </div>
            <div class="register-form__error-message">
                @if ($errors->has('season'))
                <p class="register-form__error-message">{{$errors->first('season')}}</p>
                @endif
            </div>
        </div>

        <div class="register-form__group">
            <label class="register-form__label" for="description">商品説明<span class="register-form__required">必須</span>
            </label>
            <div class="register-form__description-input">
            <textarea class="register-form__textarea" name="description" id="" cols="30" rows="10" placeholder="商品の説明を入力">{{ old('description')}}</textarea>
            </div>
            <div class="register-form__error-message">
                @if ($errors->has('description'))
                <p class="register-form__error-message">{{$errors->first('description')}}</p>
                @endif
            </div>
        </div>

        <div class="register-form__btns">
        <input class="register-form__btn-back" type="button" value="戻る" name="back">
        <input class="register-form__btn btn" type="submit" value="登録">
        </div>
        </form>
    </div>
</div>
@endsection