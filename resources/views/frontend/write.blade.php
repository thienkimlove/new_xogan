@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="article-content">
                <p>Bạn muốn chia sẻ về thông tin, tình trạng bệnh hoặc muốn đặt câu hỏi về bệnh. Vui lòng đăng bài viết</p>
                <p><strong><a href="javascript:void(0)" class="links link-post" title="Đăng bài viết" style="color: #960014;">Đăng bài viết</a></strong></p>
                <p>Bạn cần Đăng ký để gửi bài viết mới</p>
                <div class="btns">
                    <a href="javascript:void(0)" class="links link-regis" title="Đăng ký">Đăng ký</a> |
                    <a href="javascript:void(0)" class="links link-login" title="Đăng nhập">Đăng nhập</a>
                </div>
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection