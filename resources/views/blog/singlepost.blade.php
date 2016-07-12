@extends('layouts.app')

@section('title')
    {!! $blog->title !!}
@endsection


@section('content')

                                    <!--Single blog-->
    <div >

    

        <?php
                $author = \App\User::select()->where('id',$blog->author_id)->first();
                $cat = \App\Category::select()->where('id',$blog->category_id)->first();
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
                          by <a href="/byauthor/{{ $author->id }}">{!! $author->name!!}</a> | Category <a href="/bycategory/{{ $cat->id }}">{{ $cat->name }}</a> |
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

                                                     <br><br>
            
                       <div class="image">
                            <a href="../post/{!! $blog->id !!}">
                                <img class="img-responsive post_image" border="1" src="../post_images/{!! $blog->cover !!}" alt="">
                                <br>
                            </a>
                       </div>



                <p class="well-p">{!! $blog->body !!}<br></p>


        </div>

    </div>



@endsection
