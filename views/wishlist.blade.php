@extends('teebpd::layouts.demonstration')

@section('content')
    @if($visitor)
        @if(session()->has('error')) <p class="woocommerce-error">{{ session('error') }}</p> @endif
        @if(session()->has('info')) <p class="woocommerce-info">{{ session('info') }}</p> @endif
        @php $visitor->load(['Wishlists.Products.Images','SharedWishlist.Products.Images']); @endphp
        <h1 class="entry-title">My Wishlists</h1>
        @if($visitor->Wishlists->isNotEmpty())
            <div class="dokan-stores">
                <div id="dokan-seller-listing-wrap">
                    <ul class="dokan-seller-wrap">
                        @foreach($visitor->Wishlists as $wishList)
                            <li class="dokan-single-seller woocommerce coloum-3">
                                <div class="store-wrapper">
                                    <div class="store-content">
                                        <div class="store-info" style="@if($wishList->Products->isNotEmpty() && $wishList->Products[0]->Images->isNotEmpty()) background-image: url('{{ $wishList->Products[0]->Images[0]->__upload_file_details['image']['url'] }}'); @else background-image: url('/teebpd/images/product/images/NO-IMAGE-AVAILABLE.jpg'); @endif">
                                            <div class="store-data-container">
                                                <div class="featured-favourite"></div>
                                                <div class="store-data">
                                                    <h2><a href="{{ route('wishlist.detail',$wishList->id) }}">{{ $wishList->name }}</a></h2>
                                                    <p class="wl-description">{!! nl2br($wishList->description) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="store-footer">
                                        <a href="{{ route('wishlist.detail',$wishList->id) }}" class="dokan-btn dokan-btn-theme">View in Detail</a>
                                        <a href="{{ route('wishlist.delete',$wishList->id) }}" class="dokan-btn dokan-btn-theme pull-right" style="background-color: #e42234">Delete</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <time class="entry-date">You have no any wish list created</time>
        @endif
        <h1 class="entry-title margin-top-45">Wishlists Shared with Me</h1>
        @if($visitor->SharedWishlist->isNotEmpty())
            <div class="dokan-stores">
                <div id="dokan-seller-listing-wrap">
                    <ul class="dokan-seller-wrap">
                        @foreach($visitor->SharedWishlist as $wishList)
                            <li class="dokan-single-seller woocommerce coloum-3">
                                <div class="store-wrapper">
                                    <div class="store-content">
                                        <div class="store-info" style="@if($wishList->Products->isNotEmpty() && $wishList->Products[0]->Images->isNotEmpty()) background-image: url('{{ $wishList->Products[0]->Images[0]->__upload_file_details['image']['url'] }}'); @endif">
                                            <div class="store-data-container">
                                                <div class="featured-favourite"></div>
                                                <div class="store-data">
                                                    <h2><a href="{{ route('wishlist.detail',$wishList->id) }}">{{ $wishList->name }}</a></h2>
                                                    <small class="entry-date">{{ $wishList->Author->name }}</small>
                                                    <p class="wl-description">{!! nl2br($wishList->description) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="store-footer">
                                        <a href="{{ route('wishlist.detail',$wishList->id) }}" class="dokan-btn dokan-btn-theme">View in Detail</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <time class="entry-date">No body shared any wish list with you</time>
        @endif

        <h1 class="entry-title margin-top-45">Create New Wish List</h1>
        <form method="post" action="{{ route('wishlist') }}" id="new_wishlist" onsubmit="return wishlistValidate()">@csrf
            <ul class="list-unstyled">
                <li style="margin-top: 3px;"><input type="text" name="name" value="" size="40" placeholder="Enter A Name ..." autocomplete="off"></li>
                <li style="margin-top: 3px;"><textarea name="description" cols="45" rows="4" placeholder="Enter Description ..." autocomplete="off"></textarea></li>
                <li style="margin-top: 3px;"><input type="submit" class="btn" name="create-wishlist" value="Add WishList"><small style="visibility: hidden; color: #900b00; margin-left: 25px;">Please enter a name</small></li>
            </ul>
        </form>
        @push('script')<script type="text/javascript">
            function wishlistValidate(){
                name = $('[name="name"]','#new_wishlist').val(); desc = $('[name="description"]','#new_wishlist').val();
                if(name.trim() == "") { $('small','#new_wishlist').css('visibility','visible'); return false }
                $('small','#new_wishlist').css('visibility','hidden'); return true;
            }
        </script>@endpush
    @else
        <h3 class="entry-title">Please set your details for accessing Wishlists</h3>
        <form method="post" action="{{ route('store.visitor') }}" onsubmit="return setVisitorValidate2()" id="set-user-form">@csrf
            <div style="margin-bottom: 3px;"><input type="text" name="name" value="" size="40" placeholder="Enter Your Name ..." autocomplete="off"></div>
            <div style="margin-bottom: 3px;"><input type="email" name="email" value="" size="40" placeholder="Enter Your Email ..." autocomplete="off"></div>
            <div style="margin-bottom: 3px;"><input type="text" name="number" value="" size="40" placeholder="Enter Your Number ..." autocomplete="off"></div>
            <div style="margin-bottom: 3px;"><input type="submit" name="set-visitor" value="Submit"><small style="visibility: hidden; color: #900b00; margin-left: 15px;">Please fill Name and either Mobile or Email</small></div>
        </form>
        @push('script')<script type="text/javascript">
            function setVisitorValidate2(){
                email = $('[name="email"]','#set-user-form').val(); number = $('[name="number"]','#set-user-form').val(); name = $('[name="name"]','#set-user-form').val();
                if((email.trim() == "" && number.trim() == "") || name.trim() == "") { $('small','#set-user-form').css('visibility','visible'); return false }
                $('small','#set-user-form').css('visibility','hidden'); return true;
            }
        </script>@endpush

    @endif
@endsection
