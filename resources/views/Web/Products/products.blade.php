@inject('categories','App\Models\Category')
@extends('Web.app')

@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form action="{{url('/products')}}">
                            <input class="form-control" placeholder="Search here..." type="text" name="q">
                            <button type="submit"> <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Categories</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">

                            <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men2">Footwear
                                </a>
                                <div class="collapse show" id="sub-men2" data-parent="#list-group-men">
                                    <div class="list-group">
                                        @foreach($categories->all() as $catgory)
                                            @if($catgory->main_category ==='Footwear')
                                                <a href="{{url('/products', ['category' => $catgory->id])}}" class="list-group-item list-group-item-action">
                                                    {{$catgory->name}} <small class="text-muted"> ({{$catgory->products->count()}})</small>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Bags
                                </a>
                                <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                    <div class="list-group">
                                        @foreach($categories->all() as $catgory)
                                            @if($catgory->main_category ==='Bags')
                                                <a href="{{url('/products', ['catgory' => $catgory->id])}}" class="list-group-item list-group-item-action">
                                                    {{$catgory->name}} <small class="text-muted"> ({{$catgory->products->count()}})</small>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
{{--                    <div class="filter-price-left">--}}
{{--                        <div class="title-left">--}}
{{--                            <h3>Price</h3>--}}
{{--                        </div>--}}
{{--                        <div class="price-box-slider">--}}
{{--                            <div id="slider-range"></div>--}}
{{--                            <p>--}}
{{--                                <input type="text" readonly style="border:0; color:#fbb714; font-weight:bold;">--}}
{{--                                <button class="btn hvr-hover" type="submit">Filter</button>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
{{--                    <div class="product-item-filter row">--}}
{{--                        <div class="col-12 col-sm-8 text-center text-sm-left">--}}
{{--                            <div class="toolbar-sorter-right">--}}
{{--                                <span>Sort by </span>--}}
{{--                                <form action="{{url('/products')}}">--}}
{{--                                    <select id="basic" name="sort" class="selectpicker show-tick form-control" data-placeholder="$ USD">--}}
{{--                                        <option data-display="Select"> Nothing </option>--}}
{{--                                        <option type="submit" value="asc"> High Price → Low Price </option>--}}
{{--                                        <option value="desc"> Low Price → High Price </option>--}}
{{--                                    </select>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-sm-4 text-center text-sm-right">--}}
{{--                            <ul class="nav nav-tabs ml-auto">--}}
{{--                                <li>--}}
{{--                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>

                    <div class="row product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    @forelse($products as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        @if($product->discount) <p class="sale">Sale</p> @endif
                                                    </div>
                                                    <img src="images/" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="{{route('products.show', $product->id)}}" target="_blank" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><a href="{{route('products.show', $product->id)}}"> {{$product->name }} </a> </h4>
                                                    <h5> {{$product->price }} </h5>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        &nbsp; &nbsp; &nbsp;
                                            <strong> There's no P r o d u c t s .</strong>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
@endsection

{{--{{$products->links()}}--}}
