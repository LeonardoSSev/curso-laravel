<h1>Listagem dos produtos</h1>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
    </tr>
    @endforeach
</table>