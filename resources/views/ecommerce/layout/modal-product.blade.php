<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="product-{{ $product->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal__container" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                        <!-- Start product images -->
                        <div class="product-images">
                            <div class="text-center">
                                <div class="owl-carousel">
                                    @foreach($product->attachments()->get() as $photo)
                                    <div>
                                        <img src="{{asset('storage/public/'.$photo->path)}}">
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <!-- end product images -->
                        <div class="product-info">
                            <h1>{{ $product->name }}</h1>

                            <div class="price-box-3">
                                <div class="s-price-box">
                                    <span class="new-price">@money($product->value)</span>
                                </div>
                            </div>
                            <div class="quick-desc">
                                {{ $product->description }}
                            </div>

                            <div class="select__size">
                                <h2 class="mr-4">Quantidade:</h2>  <input type="number" min="1" max="{{ $product->stock->next_number }}" value="1" id="qtd" style="width: 50px">
                            </div>

                            <div class="select__size">
                                <h2>Quantidade em estoque:</h2>
                                <ul class="color__list">
                                    <li class="l__size"><a title="L">{{ $product->stock->next_number }} </a> </li>
                                </ul>
                            </div>

                            <div class="social-sharing">
                                <div class="widget widget_socialsharing_widget">
                                    <h3 class="widget-title-modal">Compartilhe este produto</h3>
                                    <ul class="social-icons">
                                        <li><a target="_blank" title="facebook" href="#" class="facebook social-icon"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a target="_blank" title="whatsapp" href="#" class="hatsapp social-icon"><i class="zmdi zmdi-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="addtocart-btn">
                                <a href="{{ route('ecommerce.add_cart', $product->id) }}" class="js-add-cart">Comprar</a>
                            </div>
                        </div><!-- .product-info -->
                    </div><!-- .modal-product -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
</div>