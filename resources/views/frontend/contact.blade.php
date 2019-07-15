@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('lien-he')}}" title="Liên hệ">Liên hệ</a></h3>
                    </div>
                    <div class="contact-content">
                        @include('frontend.form_get_phone', ['is_full' => true])
                        <div class="address-group">
                            <strong>Công ty TNHH Truyền thông Sức khỏe là Vàng</strong><br>
                            * Trụ sở chính: Thôn 3, xã Phù Lưu Tế, Huyện Mỹ Đức, thành phố Hà Nội.<br>
                            * Số điện thoại: 0243.9901436 <br>
                            * Email: phongbenhgan.fb@gmail.com<br>
                            * Các thông tin trên website dùng để tham khảo, khi áp dụng nên hỏi ý kiến Bác sĩ chuyên khoa.<br>
                            * Chúng tôi không chịu bất cứ trách nhiệm nào do việc tự ý áp dụng các thông tin trên website gây ra.<br>
                        </div>
                        <div class="embed-ggmap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6243760497027!2d105.79922031450425!3d21.007688986009732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca10dc28473%3A0x89fda75af78a62cb!2zQ8O0bmcgdHkgVHXhu4cgTGluaA!5e0!3m2!1svi!2s!4v1533789339544" width="678" height="425" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    @include('frontend.list_button')
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection
