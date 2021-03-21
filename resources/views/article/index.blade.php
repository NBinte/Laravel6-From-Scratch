@extends ('layout1')


@section('content')

    <div id="wrapper">
        <div id="page" class="container">



            @forelse ($articles as $article)

                <div class="content">

                    <div class="title">

                        {{-- <li class="first">
                            <h3> <a href="/articles/{{ $article->id }}"> {{ $article->title }} </a></h3>
                            <p>{{ $article->excerpt }}</p>
                        </li> --}}

                        <h2>

                            {{-- <a href="/articles/{{ $article->id }}"> --}}

                            {{-- <a href="{{ route('article.show', $article->id) }}"> --}}

                            {{-- <a href="{{ route('articles.show', $article) }}"> --}}

                            <a href="{{ $article->path() }}">

                                {{ $article->title }}

                            </a>


                        </h2>

                    </div>

                    <p>

                        <img src="../images/banner.jpg" alt="" class="image image-full" />
                    </p>

                    {!! $article->excerpt !!}
                    {{-- the data won't be escaped through htmlentitites with this syntax, html will be applied --}}


                </div>

            @empty

                <p> No relevent articles found :( </p>

            @endforelse

        </div>




        <div id="stwo-col">
            <div class="sbox1">
                <h2>Etiam rhoncus</h2>
                <ul class="style2">
                    <li><a href="#">Semper quis egetmi dolore</a></li>
                    <li><a href="#">Quam turpis feugiat dolor</a></li>
                    <li><a href="#">Amet ornare hendrerit lectus</a></li>
                    <li><a href="#">Quam turpis feugiat dolor</a></li>
                </ul>
            </div>
            <div class="sbox2">
                <h2>Integer gravida</h2>
                <ul class="style2">
                    <li><a href="#">Semper quis egetmi dolore</a></li>
                    <li><a href="#">Quam turpis feugiat dolor</a></li>
                    <li><a href="#">Consequat lorem phasellus</a></li>
                    <li><a href="#">Amet turpis feugiat amet</a></li>
                </ul>
            </div>
        </div>

    </div>
    </div>


@endsection
