@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('chuyen-muc', $post->category->slug)}}" title="Video">{{$post->category->name}}</a></h3>
                        <span>|</span>
                        <h4>{{$post->title}}</h4>
                    </div>
                    <div class="detail-content">
                        <article class="detail">
                            <span class="detail-title">{{$post->title}}</span>
                            <ul class="tabs detail-tabs rs">
                                <li class="tab-1 tab active" data-content="#tab-8"><h3 class="rs"><a href="javascript:void(0)" title="Thông tin sản phẩm">THÔNG TIN SẢN PHẨM</a></h3></li>
                                <li class="tab-2 tab" data-content="#tab-9"><h3 class="rs"><a href="javascript:void(0)" title="Bằng chứng khoa học">bằng chứng khoa học</a></h3></li>
                                <li class="tab-3 tab" data-content="#tab-10"><h3 class="rs"><a href="javascript:void(0)" title="Cảm nhận khách hàng">cảm nhận khách hàng</a></h3></li>
                            </ul>
                            <div class="tab-content detail-tab-content">
                                <div id="tab-8" class="content active">
                                    <article>
                                        {!! $post->content !!}
                                    </article>
                                </div>
                                <div id="tab-9" class="content">
                                    <article>
                                        {!! $post->content_1 !!}
                                    </article>
                                </div>
                                <div id="tab-10" class="content">
                                    <article>
                                        {!! $post->content_2 !!}
                                    </article>
                                </div>
                            </div>
                        </article>
                        <div class="ads">
                            @foreach (\App\Site::getFrontendBanners()->where('position', 2) as $banner)
                                <a href="{{$banner->link}}" title="Banner" target="_blank">
                                    <img src="{{url('files', $banner->image)}}" alt="" class="imgFull" width="658" height="136">
                                </a>
                            @endforeach
                        </div>
                        <div class="box-tags">
                            <span>Từ khóa: </span>
                            @foreach ($post->tags as $tag)
                                <a href="{{url('tu-khoa', $tag->slug)}}" title="">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        @include('frontend.list_button')
                        <div class="related-news">
                            <div class="custom-global-title">
                                <a href="#"> TIN LIÊN QUAN</a>
                            </div>
                            <div class="box-bd">
                                @foreach ($post->related_posts as $rPost)
                                    <div class="item cf item-r">
                                        <h3>
                                            <a href="{{url($rPost->slug.'.html')}}">{{$rPost->title}}</a>
                                        </h3>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="comment-post">
                            <div class="tabs tabComment">
                                <a href="javascript:void(0)" class="default-tab active" title="Bình luận" data-content=".default-comments">Bình luận bài viết</a>
                                <a href="javascript:void(0)" class="fb-tab " title="Bình luận Facebook" data-content=".fb-cmt-content">Bình luận facebook</a>
                            </div>
                            <div class="fb-cmt-content cmtContent">
                                <div class="fb-comments" data-href="{{url( $post->slug.'.html')}}" data-numposts="2" data-width="100%"></div>
                            </div>
                            <div class="default-comments cmtContent active">
                                <div class="content">
                                    <!--<div class="old-cmt">-->
                                    <!--<div class="name">Phương Mai đã bình luận</div>-->
                                    <!--<div class="date">27-12-2017 10:18</div>-->
                                    <!--<div class="cmt-content">Thông tin khoa học cần tham khảo</div>-->
                                    <!--<a href="javascript:void(0)" class="your-answer-btn" title="Trả lời">Trả lời</a>-->
                                    <!--</div>-->
                                    <div class="new-cmt">
                                        <form action="" class="cmt-form">
                                            <input type="text" name="name" placeholder="Nhập tên của bạn">
                                            <input type="text" name="email" placeholder="Nhập email của bạn">
                                            <textarea name="content" cols="30" rows="6" placeholder="Nội dung"></textarea>
                                            <button class="send-cmt">Gửi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection