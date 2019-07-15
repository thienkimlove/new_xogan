@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('chuyen-muc', $post->category->slug)}}" title="{{$post->category->name}}">{{$post->category->name}}</a></h3>
                        <span>|</span>
                    </div>
                    <div class="detail-content">
                        <article class="detail">
                            <h1 class="detail-title">{{$post->title}}</h1>
                            <div class="infos">
                                @if (isset($post->author))
                                    <span class="adPost"><a href="{{ url('/author/'.$post->author->slug) }}">{{ $post->author->name }}</a></span> |
                                @endif
                                @if ($post->created_at)
                                    <span class="datePost">{{ $post->created_at->format('d/m/Y') }}</span> |
                                @endif
                                <span class="view">{{ $post->views }} views</span>

                                    <br/>

                                @if (isset($post->expert))
                                    Tham vấn y khoa : <span class="adPost"><a href="{{ url('/author/'.$post->expert->slug) }}">{{ $post->expert->name }}</a></span>
                                @endif
                          </div>
                            <div class="detail-tab-content">
                                <div class="content">
                                    <article>
                                      {!! $post->content !!}
                                    </article>
                                </div>
                            </div>
                        </article>
                        <div class="box-tags">
                            <span>Từ khóa: </span>
                            @foreach ($post->tags as $tag)
                                <a href="{{url('tu-khoa', $tag->slug)}}" title="">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <div class="delivery">
                            <h3 class="note-pp">
                                Để mua đúng sản phẩm chính hãng, Quý khách có thể thực hiện một trong những cách sau:
                            </h3>
                            <div class="note1 note">
                                <div class="title">
                                    <span class="number">1</span>
                                    Điền vào form thông tin đặt hàng online - giao hàng và thu tiền tại nhà dưới đây .
                                </div>
                                <form action="{{url('saveOrder')}}" id="order_online" method="POST">
                                    <div class="row1">
                                        <input type="text" id="name" name="name" placeholder="Họ tên">
                                        <input type="text" id="address" name="address" placeholder="Địa chỉ">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    </div>
                                    <div class="row2">
                                        <input type="number" id="phone" name="phone" placeholder="Điện thoại">
                                        <select name="product_id" id="product_id">
                                            <option>Chọn sản phẩm</option>
                                            @foreach (\App\Site::getListOfProducts() as $id => $product)
                                                <option value="{{$id}}">{{$product}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row3">
                                        <input type="hidden" name="redirect_url" value="{{request()->fullUrl()}}" />
                                        <input type="text" id="note" name="note" placeholder="Ghi chú">
                                        <input type="number" id="quantity" name="quantity" placeholder="Số lượng" class="sl-onl"> <label for="">hộp</label>
                                        <button id="delivery_form_submit" class="btn-order-onl">ĐẶT MUA HÀNG</button>
                                    </div>

                                    @if (isset($success_delivery_form_message) && $success_delivery_form_message)
                                        <div class="error" id="delivery_form_message">Bạn đã đặt hàng thành công. Chúng tôi sẽ liên hệ lại với bạn để xác nhận.</div>
                                    @else
                                        <div class="error" id="delivery_form_message" style="display: none"></div>
                                    @endif

                                </form>
                            </div>
                            <div class="note2 note">
                                <div class="title">
                                    <span class="number">2</span>
                                    Gọi tới tổng đài tư vấn và chăm sóc KH: <a href="tel:18001190">1800 1190 </a> (miễn phí cước gọi) - <a href="tel:0912571190">0912 571 190</a>
                                </div>
                            </div>
                            <div class="note3 note">
                                <div class="title">
                                    <span class="number">3</span>
                                    Hoặc mua tại các nhà thuốc trên toàn quốc
                                </div>
                            </div></div>
                        @include('frontend.list_button')
                        <div class="ads">
                            @foreach (\App\Site::getFrontendBanners()->where('position', 2) as $banner)
                                <a href="{{$banner->link}}" title="Banner" target="_blank">
                                    <img src="{{url('files', $banner->image)}}" alt="" class="imgFull" width="658" height="136">
                                </a>
                            @endforeach
                        </div>
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
                                    @foreach ($post->details->where('status', 1) as $detail)
                                        <div class="old-cmt">
                                            <div class="name">{{$detail->name}} đã bình luận</div>
                                            <div class="date">{{$detail->created_at->toDateTimeString()}}</div>
                                            <div class="cmt-content">{{$detail->content}}</div>
                                            <a href="javascript:void(0)" class="your-answer-btn" title="Trả lời">Trả lời</a>
                                        </div>
                                    @endforeach
                                    <div class="new-cmt">
                                        {!! Form::open(array('url' => 'saveComment', 'class' => 'cmt-form', 'id' => 'post_detail_comment_form')) !!}
                                            <input type="text" name="name" placeholder="Nhập tên của bạn">
                                            <input type="text" name="email" placeholder="Nhập email của bạn">
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <textarea name="content" id="" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
                                            <button id="post_detail_send_comment" class="send-cmt">Gửi bình luận</button>
                                        {!! Form::close() !!}
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