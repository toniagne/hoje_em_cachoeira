@extends('layouts.admin.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fa/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/locales/pt_BR.js"></script>
@endpush
@section('content-header')
    Editar cliente: <b>{{$client->name}}</b>
@endsection

@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">


            <div class="box box-primary">

                @if ($errors->any())
                    <div class="card-body">
                        <div class="callout callout-danger">
                            <h5>Preencha corretamente os campos.</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
            @endif

            <!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">.</h3>
                                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Dados do cliente</a></li>
                            <li><a href="#tab2" data-toggle="tab">Galeria de fotos</a></li>
                        </ul>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="name">Nome do cliente</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" placeholder="Nome do cliente">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Raz??o social</label>
                                                    <input type="text" class="form-control" id="company" name="company" value="{{ $client->company }}" placeholder="Raz??o Social">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">CNPJ / CPF</label>
                                                    <input type="text" class="form-control" id="document" name="document" value="{{ $client->document }}" placeholder="CNPJ/CPF">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">E-mail</label>
                                                    <input type="email" value="{{  $client->email }}" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Telefone comercial</label>
                                                    <input type="text" class="form-control " name="phone_comercial" id="phone_comercial" value="{{ $client->phone_comercial }}" placeholder="Telefone comercial">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Telefone/Whatsapp</label>
                                                    <input type="text" class="form-control " name="phone" id="phone" value="{{ $client->phone  }}" placeholder="Telefone/WhatsApp">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cep">CEP</label>
                                                    <input type="text" name="cep"  class="form-control cep" value="{{ $client->cep }}" id="cep" placeholder="CEP">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Endere??o</label>
                                                    <input type="text" name="address"  class="form-control" value="{{ $client->address }}" id="address" placeholder="Endere??o completo">
                                                </div>
                                                <h4>ACESSSO AO SISTEMA</h4>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Senha</label>
                                                    <input type="password"   name="password" class="form-control" id="exampleInputEmail1" placeholder="Senha">
                                                </div>
                                                <h4>REDES SOCIAIS</h4>
                                                <div class="form-group">
                                                    <label for="facebook">Facebook</label>
                                                    <input type="text" name="facebook"  class="form-control" value="{{ $client->facebook }}" id="facebook" placeholder="Perfil Facebook">
                                                    <p class="help-block">Incluir o endere??o compelto Ex.: https://www.facebook.com/hojeemcachoeira</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="instagram">Instagram</label>
                                                    <input type="text" name="instagram"  class="form-control" value="{{ $client->instagram }}" id="facebook" placeholder="Perfil Instagram">
                                                    <p class="help-block">Incluir o endere??o compelto Ex.: https://www.instagram.com/hojeemcachoeira</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="site">Site</label>
                                                    <input type="text" name="site"  class="form-control" value="{{ $client->site }}" id="facebook" placeholder="WEB Sit">
                                                </div>

                                                <div class="form-group">
                                                    <label for="address">Release</label>
                                                    <textarea class="textarea" name="release" placeholder="Place some text here"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $client->release !!}  </textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="services">Resumo dos servi??os da empresa</label>
                                                    <textarea class="textarea" name="services" placeholder="Servi??os que a empresa presta"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $client->services !!}</textarea>
                                                </div>

                                                <img src="{{ asset('storage/'.$client->file) }}" alt="" title="">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Logotipo</label>
                                                    <input type="file" name="logo" id="exampleInputFile">

                                                    <p class="help-block">Arquivos PNG - JPG.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                          <div class="box-body">

                                              <div class="card-body">
                                                  <div class="row">
                                                      @foreach ($client->attachments()->get() as $photo)
                                                          <div class="col-sm-2">
                                                              <div style="height: 150px;">
                                                                  <a href="{{ asset('storage/public/'.$photo->path) }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                                                      <img src="{{ asset('storage/public/'.$photo->path) }}" class="img-fluid mb-2" alt="white sample" width="150px">
                                                                  </a>
                                                              </div>
                                                              <a href="{{route('clients.photo', [$photo->id, $client->id])}}"><i class="fa fa-trash"></i></a>
                                                          </div>
                                                      @endforeach
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <input id="input-b1" name="attachments[]" type="file" class="file" multiple data-browse-on-zone-click="true">
                                              </div>
                                          </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="submit" class="btn btn-block btn-success" value="ATUALIZAR">
                </form>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        @push('scripts')
            <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
            <script type="text/javascript">
                $(function () {
                    // Summernote
                    $('.textarea').summernote()
                })
            </script>
    @if ($errors->any())
        {!! toastr()->error('Houve um erro no cadastro', 'Aten????o')->render() !!}
    @endif
    @endpush
@endsection

