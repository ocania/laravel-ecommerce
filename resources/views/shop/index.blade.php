<x-app-layout>
    <p>Shop</p>
    <p>
        @if (session('message'))
            <p>{{ session('message') }}</p>
        @endif
    </p>
    <div class="grid gap-4 grid-cols-3">
        @forelse($products as $product)
            <div>
                <p>{{$product->name}}</p>
                <p>{{$product->price}}€</p>
                <p><a href="{{route('cart.add', $product)}}">Add to cart</a></p>
            </div>
        @empty
            <p>No products found</p>
        @endforelse
    </div>
</x-app-layout>