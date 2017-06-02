<footer>
    <div class="fixCen">
        <div class="copyright">
            TIỀN LIỆT VƯƠNG - GIẢM TIỂU ĐÊM - DỊU ÊM TIỀN LIỆT TUYẾN
        </div>
    </div>
</footer>
<div class="others">
    <div class="fixCen">
        <div class="content">
            <div class="links">
                <a href="{{url('lien-he')}}" title="Thông tin sản phẩm">Liên hệ</a>
                <a href="{{url('hoi-dap')}}" title="Thông tin sản phẩm">Hỏi đáp</a>
                <a href="{{url('video')}}" title="Thông tin sản phẩm">Video</a>
                <a href="{{url('phan-phoi')}}" class="diem-ban-btn" title="Điểm bán sản phẩm">ĐIỂM BÁN</a>
            </div>
        </div>
        <div class="content">
            <div class="links">
                @foreach (\App\Site::getAllParentCategories() as $parentCategory1)
                    <a href="{{url('chuyen-muc', $parentCategory1->slug)}}" title="{{$parentCategory1->name}}">{{$parentCategory1->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="content">
            <div class="btn-groups">
                <a  href="tel:0912571190" class="diem-ban-btn"  title="Tư vấn miễn phí">
                    <img src="{{url('viemgan/images/tu-van-1.png')}}" alt="">
                </a>
                <a href="{{url('phan-phoi')}}" class="tu-van-btn" title="Điểm bán">
                    <img src="{{url('viemgan/images/diem-ban-1.png')}}" alt="">
                </a>
            </div>
            <div class="text">
                Giảm tiểu đêm - Dịu êm tiền liệt tuyến
            </div>
        </div>
    </div>
</div>