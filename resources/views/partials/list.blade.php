@if (!$items->count())
    @include('partials.empty-list')
    <?php return ?>
@endif

<table class="table table-hover">
    <thead>
    <tr>
        <th class="snug">
            {!! $sortable ? sorterLink('id') : 'id' !!}
        </th>
        <th class="snug c">
            {!! $sortable ? sorterLink('users.name', 'User') : 'User' !!}
        </th>
        <th class="snug c">
            {!! $sortable ? sorterLink('products.name', 'Product') : 'Product' !!}
        </th>
        <th class="snug c">
            {!! $sortable ? sorterLink('products.price', 'Price') : 'Price' !!}
        </th>
        <th class="snug c">
            {!! $sortable ? sorterLink('count', 'Quantity') : 'Quantity' !!}
        </th>
        <th class="snug c">
            {!! $sortable ? sorterLink('created_at', 'Purchased') : 'Purchased' !!}
        </th>
        <th class="snug c">
            {!! $sortable ? sorterLink('sum', 'Total') : 'Total' !!}
        </th>
        <th class="snug c">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
        <tr>

            <td class="snug code">
                {{ $item->id }}
            </td>
            <td class="snug c">
                {{ $item->user->name }}
            </td>

            <td class="snug c">
                {{ $item->product->name }}
            </td>

            <td class="snug c">
                {{ $item->product->price }}
            </td>

            <td class="snug c">
                {{ $item->count }}
            </td>

            <td class="snug c">
                @include('partials.datecol', ['date' => $item->created_at])
            </td>
            <td class="snug c">
                {{ round($item->sum, 2) }} Eur
            </td>

            <td class="snug c">
                @include('partials.actions', [
                    'buttons' => ['edit', 'delete'],
                    'controller' => 'orders',
                    'item' => $item
                ])
            </td>

        </tr>
    @endforeach
    </tbody>
</table>