@if (!$items->count())
    @include('admin.partials.empty-list')
    <?php return ?>
@endif

<table class="table table-hover">
    <thead>
    <tr>
        <th class="snug">
            {!! $sortable ? sorterLink('id') : 'id' !!}
        </th>
        <th class="snug c">
            {!! $sortable ? sorterLink('expires_at', 'Purchased') : 'Purchased' !!}
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
                @include('partials.datecol', ['date' => $item->created_at])
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