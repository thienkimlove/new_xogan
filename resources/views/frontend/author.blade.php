@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="professorInfo">
                        <div class="pro pro1 pr">
                            <div class="info">
                                <img src="{{url('files', $author->image)}}" alt="" class="avartar" width="191" height="191">
                                <div class="introduce">
                                    <div class="name">{{ $author->name }}</div>
                                    {!! $author->desc !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="listNews listNews2 cf">
                        @foreach ($posts as $post)
                        <div class="item">
                            <a href="#" class="thumb" style="background: url({{ url('files', $post->image) }}) center center no-repeat;-webkit-background-size: cover;background-size: cover;">
                                <img src="{{url('files', $post->image)}}" alt="" width="188" height="125">
                            </a>
                            <h3>
                                <a href="{{ url($post->slug.'.html') }}">
                                   {{ $post->title }}
                                </a>
                            </h3>
                            <p>
                                {!! $post->desc !!}
                            </p>
                        </div>
                        @endforeach
                    </div>
                    @include('frontend.pagination', ['paginate' => $posts])
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection