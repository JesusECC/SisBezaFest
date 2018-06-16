@extends ('layouts.pagina')
@section ('contenido')
<div class="row">
    <div class="container">
        <table class="table table-hover text-centered">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($detalleVenta as $dv)
                <tr>
                    <th scope="row">{{$dv->nombre}}</th>
                    <td>{{$dv->precio}}</td>
                    <td>{{$dv->cantidad}}</td>
                    <td>{{$dv->total}}</td>
                    <td>{{$dv->estado}}</td>
            @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection