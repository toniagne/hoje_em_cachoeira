@isset($banners)

@foreach($banners as $banner)
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="side-bar-block main-block ad-block">
            <div class="main-img ad-img">
                <a href="{{ $banner->link }}" target="_blank">
                    <img src="{{asset('storage/public/'.$banner->file)}}" class="img-responsive" alt="car-ad" />

                </a>
            </div><!-- end ad-img -->
        </div><!-- end side-bar-block -->
    </div><!-- end columns -->
</div><!-- end row -->
    <br>
@endforeach
@endisset

