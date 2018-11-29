Hi TEEB Emirates,
One of your visitor, {{ $item->added ? $item->Added->name : '' }}, added the product, {{ $product->name }}, to the wish list, {{ $wishlist->name }}.
Login to your cPanel to view and manage further.
{{ route('login') }}
