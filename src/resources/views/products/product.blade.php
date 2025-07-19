@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css')}}">
@endsection

@section('content')
<div class="product">
    <div class="product__header">
        <h2 class="product__heading content__heading">
            @if(!empty($keyword))
            "{{ $keyword }}"の商品一覧
            @else
            商品一覧
            @endif
        </h2>

        <a href="{{ route('products.create') }}" class="header__link">+商品を追加</a>
    </div>

    <div class="product__container">
        <div class="product__sidebar">
            <form class="search-form" action="{{ route('products.search') }}" method="GET">
                <input type="text" name="keyword" placeholder="商品名で検索" value="{{ old('keyword', $keyword ?? '') }}">
                <button type="submit">検索</button>
            </form>

            <div class="sort-title">価格順で表示</div>

            <form class="sort-form" action="{{ route('products.index') }}" method="GET">
                <select name="sort" onchange="this.form.submit()">
                    <option value="">価格で並べ替え</option>
                    <option value="high" {{ request('sort') === 'high' ? 'selected' : '' }}>高い順に表示</option>
                    <option value="low" {{ request('sort') === 'low' ? 'selected' : '' }}>低い順に表示</option>
                </select>

                @if(request('sort'))
                <div class="sort-tag">
                    {{ request('sort') === 'high' ? '高い順に表示' : '低い順に表示' }}
                    <a href="{{ route('products.index') }}" class="sort-reset">×</a>
                </div>
                @endif

        </div>

        <div class="product__main">
            <div class="product__list">
                @foreach ($products as $product)
                <div class="product-item">
                    <a href="{{ route('products.show', $product->id) }}">
                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}">
                    </a>
                    <div class="product-info">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <p class="product-price">¥{{ number_format($product->price) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection