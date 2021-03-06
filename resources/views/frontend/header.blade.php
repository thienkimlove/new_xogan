<div class="widget-wrap">
    <div class="hide-form-phone">
        <p>Để lại tin nhắn cho chúng tôi</p>
    </div>
    <div class="show-form-phone">
        <h4>Để lại tin nhắn cho chúng tôi</h4>
        <div class="box-show">
            <p>Chỉ cần đặt câu hỏi, chuyên gia sẽ gọi lại tư vấn cụ thể cho bạn</p>
            <form id="getQues" action="{{url('saveContact')}}" method="POST">
                <input type="number" name="phone" id="box_phone" placeholder="Số điện thoại của bạn">
                <input type="hidden" value="Box Trượt" name="name" />
                <input type="hidden" name="_token" value="{{csrf_token()}}"  />
                <textarea name="content" id="box_content" placeholder="Tình trạng của bạn"></textarea>
                <input type="text" name="email" id="box_email" placeholder="Tên/ Email của bạn">
                <button id="box_submit">Gửi đi</button>
            </form>
            <p id="box_message" style="display: none"></p>
        </div>
    </div>
</div>
<div class="banner-ads left">
    @foreach (\App\Site::getFrontendBanners()->where('position', 3) as $banner)
    <a href="{{$banner->link}}" title="" target="_blank">
        <img src="{{url('files', $banner->image)}}" alt="" width="171" height="454">
    </a>
    @endforeach
</div>
<div class="btn-group-fix banner-ads">
    <a href="https://www.facebook.com//viemgan.com.vn" title="Fanpage"><img src="{{url('viemgan/images/fb-icon.png')}}" alt="Fanpage" width="63" height="63"></a>
    <a href="tel:18001190" title="Gọi tư vấn"><img src="{{url('viemgan/images/call-icon.png')}}" alt="Gọi tư vấn" width="63" height="63"></a>
    <a href="{{url('phan-phoi')}}" title="Mua hàng"><img src="{{url('viemgan/images/cart-icon.png')}}" alt="Giỏ hàng" width="63" height="63"></a>
    <a href="{{url('phan-phoi')}}" title="Điểm bán sản phẩm"><img src="{{url('viemgan/images/location-icon.png')}}" alt="Điểm bán sản phẩm" width="63" height="63"></a>
</div>
<header class="pr">
    <div class="bg-top">
        <a href="javascript:void(0)" class="miniMenu-btn pa open-main-nav" data-menu="#main-nav"></a>
    </div>
    <div class="fixCen head-info">
        <h1 class="rs leftSide"><a href="{{url('/')}}" class="logo" title="Bệnh xơ gan">
                <img src="{{url('viemgan/images/logo.png')}}" alt="Bệnh xơ gan" width="170" height="99" class="imgFull">
            </a></h1>
        <span class="slogan center">
                    Chuyên trang cộng đồng <br>
                    <strong>Dành cho người bệnh xơ gan</strong>
                </span>
        <div class="rightSide">
            <div class="btns">
                <a href="javascript:void(0)" class="btn-login" title="Đăng nhập" onclick="login()">Đăng nhập</a>
                <a href="javascript:void(0)" class="btn-regis" title="Đăng ký" onclick="register()">Đăng ký</a>
            </div>
            <a href="{{ url('/dang-bai-viet') }}" class="btn-postArticle" title="Đăng bài viết">
                Đăng bài viết
            </a>
            <form action="{{url('tim-kiem')}}" method="GET" class="search-on-top">
                <input type="text" name="q" placeholder="Tìm kiếm">
            </form>
        </div>
    </div>
    <nav id="main-nav" class="menu-mb">
        <ul class="fixCen pr rs">
            <li><a class="{{(isset($page) && $page == 'index')? 'active' : ''}}" href="{{url('/')}}" title="Trang chủ">
                    Home
                </a></li>
            @foreach (\App\Site::getAllParentCategories() as $parentCategory)
                @if ($parentCategory->subCategories->count() > 0)
                <li class="parentMenu">
                    <a href="{{url('chuyen-muc', $parentCategory->slug)}}" title="{{$parentCategory->name}}" class="{{(isset($page) && $page == $parentCategory->slug) ? 'active' : ''}}">{{$parentCategory->name}}</a>
                    <ul class="submenu">
                        @foreach ($parentCategory->subCategories as $subCategory)
                        <li><a href="{{url('chuyen-muc', $subCategory->slug)}}" title="{{$subCategory->name}}">{{$subCategory->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @else
                    <li><a href="{{url('chuyen-muc', $parentCategory->slug)}}" title="{{$parentCategory->name}}" class="{{(isset($page) && $page == $parentCategory->slug) ? 'active' : ''}}">{{$parentCategory->name}}</a></li>
                @endif
            @endforeach

            <li><a class="{{(isset($page) && $page == 'hoi-dap') ? 'active' : ''}}" href="{{url('hoi-dap')}}" title="Hỏi đáp">Hỏi đáp</a></li>
            <li><a class="{{(isset($page) && $page == 'video')? 'active' : ''}}" href="{{url('video')}}" title="Video">Video</a></li>
            <li><a class="{{(isset($page) && $page == 'phan-phoi')? 'active' : ''}}" href="{{url('phan-phoi')}}" title="Phân phối">Phân phối</a></li>
            <li><a class="{{(isset($page) && $page == 'lien-he')? 'active' : ''}}" href="{{url('lien-he')}}" title="Liên hệ">Liên hệ</a></li>
        </ul>
    </nav>
</header>
