@extends('layouts.app')

@section('content')
<section class="full-section" s-sec="store">
    <div class="section">
        <div class="row">
            <div class="col-4">
                <p class="text">Acerca de nuestras piezas</p>
            </div>
            <div class="col-2">
                <p class="text" style="text-align: justify">
                    Creamos obras en arte canvas que significa "lienzo", el lienzo puede montarse en una estructura
                de madera para dar la impresión de que se trata pintura, fabricado a base de poliéster o algodón,
                se utilizan laminados ingleses en tono brillante y mate, su elaboración es 50% a mano, para conseguir acabados a detalle con un resultadoespectacular,
                tiene características muy resistentes a la acción de la luz solar, los colores permanecen inalterados durante 99 años, manteniendo su colorido inicial.
                <br><br>
                <b>Las imágenes pueden estar sujetas a derechos de autor*</b>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <article class="search">
                <p class="text">Busca algo en particular</p>
                <searchbar></searchbar>
            </article>
            <info-slider></info-slider>
        </div>
        <div class="col-lg-4">
            <div class="products">
                @foreach ($products as $product)
                    <product :data="{{json_encode($product)}}"></product>
                @endforeach
            </div>
                {{$products->links()}}
        </div>
    </div>
</section>
@endsection