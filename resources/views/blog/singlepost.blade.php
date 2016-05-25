@extends('layouts.app')

@section('title')
    {!! $blog->title !!}
@endsection


@section('content')

                                    <!--Single blog-->
    <div class="col-md-8">

    

        <?php
                $author = \App\User::select('name')->where('id',$blog->author_id)->first();
                $cat = \App\Category::select('name')->where('id',$blog->category_id)->first();
        ?>


        <div class="well">
            
            <div class="well-header">
                 <div class="left_align">
                     <h2>
                        <a href="../post/{!! $blog->id !!}">{!! $blog->title !!}</a>
                    </h2>
                </div>
                <div class="right_align">
                    <a class="btn-close hover-animate" href="../"></a>
                    
                </div>
            </div>
           
           <br>

             <div class="post_info">
                           <div class="left_align">
                          by <a href="/">{!! $author->name!!}</a> | Category <a href="/">{{ $cat->name }}</a> |
                                Posted At: <span class="glyphicon glyphicon-time"></span> {!! $blog->created_at !!}
                            </div>
                            <div class="right_align">
                                    
                                @if(!Auth::guest())
                                    @if($blog->author_id == Auth::user()->id)

                                        <a href="../edit/post/{!! $blog->id !!}">update</a> |
                                        <a href="../remove/post/{!! $blog->id !!}">Delete</a>

                                    @endif
                                @endif
                            </div>
                    </div>

           <br>
           <a href="../post/{!! $blog->id !!}">
            <img class="img-responsive " src="../post_images/{!! $blog->cover !!}" width="900" height="300" alt=""><br>

            </a>


                <p class="well-p">{!! $blog->body !!}<br></p>


        </div>

    </div>



@endsection
