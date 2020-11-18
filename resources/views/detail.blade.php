@extends('layouts.app')

@section('content')
    <section s-sec="detail" class="section">
        <div class="row">
            <div class="col-2">
                <figure>
                    <img src="{{Storage::url($product->archivo)}}" alt="">
                    <figcaption>
                            <br>
                        <p class="category">ID: AF{{$product->id}}</p>
                        <p class="text">
                            <b>Descripción: </b> <br>
                            {!! $product->description !!}
                        </p>
                        <br><br>
                        @if ($product->elaboracion != 'null')
                            <p>
                                <b>Elaboración: </b> 
                                <br>{!! $product->elaboracion !!}
                            </p>
                        @endif
                    </figcaption>
                </figure>
            </div>
            <div class="col-2">
                <article class="art-info">
                    <p class="category">{{$product->title}}</p>
                    <p class="text">${{number_format($product->precio, 2)}}</p>
                    <ul>
                        <li>Autor: {{$product->autor}}</li>
                        <li>Técnica: {!! $product->tecnica !!}</li>
                        <li>Medidas: {{$product->size}}</li>
                        @if ($product->peso != 'null')
                            <li>Peso: {{$product->peso}}</li>
                        @endif
                        @if ($product->material != 'null')
                            <li>Material: {{$product->material}}</li>
                        @endif
                        @if ($product->laminado != 'null')
                            <li>Laminado: {{$product->laminado}}</li>    
                        @endif
                    </ul>
                </article>
            </div>
            <div class="col-10 buttons">
                @if ($product->attributes != null)
                    @foreach ($product->attributes as $a)
                        @if (isset($a->type) && $a->type == 'url')
                            <a class="btn cta" href="{!! $a->value !!}" target="_blank">Ver obra en {{$a->name}}</a>
                        @endif 
                        @if (isset($a->type) && $a->type == 'paypal')
                            <form action="https://www.paypal.com/cgi-bin/webscr" class="btn" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="business" value="martin.ru@outlook.com">
                                <input type="hidden" name="lc" value="MX">
                                <input type="hidden" name="item_name" value="test">
                                <input type="hidden" name="amount" value="{{$product->precio}}">
                                <input type="hidden" name="currency_code" value="MXN">
                                <input type="hidden" name="button_subtype" value="services">
                                <input type="hidden" name="no_note" value="0">
                                <input type="hidden" name="cn" value="Dar instrucciones especiales al vendedor:">
                                <input type="hidden" name="no_shipping" value="2">
                                <input type="hidden" name="cancel_return" value="http://www.artefinomexicano.com">
                                <input type="hidden" name="shipping" value="20">
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
                                <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
                                <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        @endif 
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <related-products></related-products>
@endsection