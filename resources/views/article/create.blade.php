@extends('layout1')

@section('bulmacdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('boot')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
@endsection

@section('content')

    <div id="wrapper">

        <div id="page" class="container">

            <h1 class="heading has-text-weight-bold is-size-4"> New Article </h1>

            <form method="POST" action="/articles">

                @csrf


                <div class="field">

                    <label for="title" class="label"> Title </label>

                    <div class="control">

                        {{-- <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title"
                            id="title"> --}}

                        <input class="input @error('title') is-danger @enderror" type="text" name="title" id="title"
                            value=" {{ old('title') }} ">

                        {{-- @if ($errors->has('title'))
                            <p class="help is-danger"> {{ $errors->first('title') }} </p>
                        @endif --}}

                        @error('title')
                            <p class="help is-danger"> {{ $errors->first('title') }} </p>
                        @enderror



                    </div>

                </div>


                <div class="field">

                    <label for="excerpt" class="label"> Excerpt </label>

                    <div class="control">

                        <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt"
                            id="excerpt">{{ old('excerpt') }}</textarea>

                        @error('excerpt')
                            <p class="help is-danger"> {{ $errors->first('excerpt') }} </p>
                        @enderror

                    </div>

                </div>


                <div class="field">

                    <label for="body" class="label"> Body </label>

                    <div class="control">

                        <textarea class="textarea @error('body') is-danger @enderror" name="body"
                            id="body">{{ old('body') }}</textarea>

                        @error('body')
                            <p class="help is-danger"> {{ $errors->first('body') }} </p>
                        @enderror

                    </div>

                </div>



                <div class="field">

                    <label for="body" class="label"> Tags </label>

                    <div class="select is-multiple control">

                        <select name="tags[]" id="" multiple>

                            @foreach ($tags as $tag)

                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>

                            @endforeach

                        </select>

                        {{-- @error('tags')
                            <p class="help is-danger"> {{ $errors->first('tags') }} </p>
                        @enderror --}}

                        @error('tags')
                            <p class="help is-danger"> {{ $message }} </p>
                        @enderror

                    </div>

                </div>




                <div class="field is-grouped">

                    <div class="control">

                        <button class="button is-link" type="submit">Submit</button>

                    </div>

                </div>

            </form>




        </div>

    </div>

@endsection
