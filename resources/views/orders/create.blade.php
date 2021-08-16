@extends('layouts.general')

@section('content')

    <div id='wrapper'>
        <div id='page' class='container'>
            <section class="section">
                <img src="/img/form-example.png" alt="voorbeeld" style="height: 250px">
            </section>
            <h1 class='has-text-weight-bold is-size-4'>New Article</h1>
            <section class="section"></section>

            <form method='POST' action="/orders">
                @csrf

                <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>1</th>
                        <td>38</td>
                      </tr>
                      <tr>
                        <th>1</th>
                        <td>38</td>
                      </tr>
                    </tbody>
                  </table>

                <div class='field'>
                    <p class='title is-4 star' for='title' data-end=" *">Title</p>

                    <div class='control'>
                    <input
                    class='input @error('title') is-danger @enderror'
                    type='text'
                    name='title'
                    id='title'
                    value='{{old('title')}}'
                    placeholder='Enter a title for your article'>

                    @error('title')
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                    @enderror
                </div>
                </div>

            </form>
        </div>
    </div>

@endsection
