@extends('layouts.app')


@section('title')
{!! $blog->title !!}
@endsection



@section('content')

                                    <!--Single blog-->
    <div class="col-md-8">

        <?php
        $author = \App\User::select('name')->where('id',$blog->author_id)->first();
        ?>


        <div class="well">
            <div align="right">
                <a class="btn-close hover-animate" href="../"></a>
            </div>
            <h2>
                <a href="../post/{!! $blog->id !!}">{!! $blog->title !!}</a>

            </h2>
            <p>
                by <a href="">{!! $author->name!!}</a> | 
            <span class="glyphicon glyphicon-time"></span> {!! $blog->created_at !!}</p>
  

            <div align="right">

                @if(!Auth::guest())
                    @if($blog->author_id == Auth::user()->id)

                        <a href="../edit/post/{!! $blog->id !!}">update</a> |
                        <a href="../remove/post/{!! $blog->id !!}">Delete</a>

                    @endif
                @endif

            </div>
            <img class="img-responsive " src="../images/{!! $blog->cover !!}" width="900" height="300" alt=""><br>




                <p class="well-p">{!! $blog->body !!}<br></p>


        </div>

    </div>



@endsection
