<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
        <th>Photo</th>
    </tr>
    <div id="dataProduct">
    @foreach($pro as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ $p->description }}</td>
            <td>{{ $p->price }}</td>
            <td>{{ $p->cat_name }}</td>
            <td><img src="/images/{{ $p->photo }}" width="80"></td>
        </tr>
    @endforeach
    </div>
    <tr>
        <td class="text-center" colspan="5">
            {{ $pro->links() }}
        </td>
    </tr>
</table>