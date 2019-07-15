@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('chuyen-muc', $category->slug)}}" title="Video">{{$category->name}}</a></h3>
                    </div>
                    <div class="list-news">
                        <div class="news">
                            @foreach ($posts as $post)
                                <div class="post post-news">
                                <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}" class="img-title" style="background-image: url({{url('files', $post->image)}})">
                                    <img src="{{url('files', $post->image)}}" alt="" width="276" height="157">
                                </a>
                                <div class="right">
                                    <a href="{{url($post->slug.'.html')}}" class="title" title="{{$post->title}}">
                                        {{$post->title}}
                                    </a>
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
                                    <div class="sumary">
                                        {{str_limit($post->desc, 150)}}
                                    </div><br />
                                    <a href="{{url($post->slug.'.html')}}" class="view-detail" title="Xem chi tiết">Xem chi tiết >></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @include('frontend.pagination', ['paginate' => $posts])
                        @include('frontend.list_button')
                    </div>
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection
