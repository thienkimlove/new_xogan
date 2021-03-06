<form action="{{url('saveContact')}}" method="post" id="form_get_phone">
<div class="box-intro">
    <div class="some-intro">
        <div class="pro-img">
            <img src="{{url('viemgan/images/bs-img.png')}}" alt="" width="206" height="199">
        </div>
        <div class="text">
            Vui lòng gọi điện đến tổng đài tư vấn miễn cước <a href="tel: 18001190">1800 1190</a> để được các chuyên gia tư vấn nhiều năm kinh nghiệm tư vấn trực tiếp.
            <br>
            * Hoặc gửi câu hỏi cho chúng tôi để được chuyên gia trả lời các thắc mắc của bạn <a href="http://www.benhxogan.com.vn/lien-he" target="_blank">TẠI ĐÂY</a><br>
            * Để mua sản phẩm tại hiệu thuốc gần chỗ bạn nhất, vui lòng xem <a href="http://www.benhxogan.com.vn/phan-phoi" target="_blank">TẠI ĐÂY</a>.<br>
            * Để mua hàng online – giao hàng, thu tiền tại nhà, <a href="http://www.benhxogan.com.vn/phan-phoi" target="_blank">ĐẶT HÀNG NGAY TẠI ĐÂY</a>. <br>
            * Ngại gọi điện? Vui lòng để lại số điện thoại, chúng tôi sẽ liên lạc lại cho bạn. <br>
      </div>
    </div>
    <div class="form-get-phone">
            <input type="hidden" name="email" value="chiasetuelinh@gmail.com">
            <input type="hidden" name="name" value="chi co dien thoai">
            <input type="hidden" name="content" value="chi co dien thoai">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="number" id="get_phone" name="phone" placeholder="Số điện thoại" class="get-phone">
            <button id="form_get_phone_button">Gửi</button>

    </div>
</div>
</form>
@if ($is_full)
<form action="{{url('saveContact')}}" method="post" id="contact">
    <div class="form-row">
        <label for="name">Họ và tên</label>
        <input type="text" name="name" id="name" placeholder="Nhập họ và tên" required>
    </div>
    <div class="form-row">
        <label for="phone">Điện thoại</label>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="tel" name="phone" id="phone" placeholder="Nhập số điện thoại" required>
    </div>
    <div class="form-row">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Nhập email" required>
    </div>

    <div class="form-row">
        <label for="content">Nội dung</label>
        <textarea name="content" id="content" cols="30" rows="10"
                  placeholder="Nhập nội dung"></textarea>
    </div>

    <div class="errors" id="delivery_form_message" style="display: none">Điền đầy đủ các thông tin</div>

    <div class="contain-btn form-row">
        <button id="delivery_form_submit" type="button">Gửi</button>
        <button id="delivery_form_reset" type="reset">Nhập lại</button>
    </div>
</form>
@endif

@section('frontend_script')
    <script>
        $(function(){
            $('#delivery_form_submit').click(function(e){
                e.preventDefault();
                var name = $('#name').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var content = $('#content').val();

                if (!name || !phone || !email || !content) {
                    $('#delivery_form_message').show();
                } else {
                    $('#contact').submit();
                }

                return false;
            });

            $('#form_get_phone_button').click(function(e){
                e.preventDefault();
                $('#form_get_phone').submit();
                return false;
            });
        });
    </script>
@endsection