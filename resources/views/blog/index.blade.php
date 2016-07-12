@extends('layouts.app')

@section('title')
   Home
@endsection

@section('content')
    

            <!-- First Blog Post -->
         @if(count($blogs)==0)
            <div class="well-header">
                 <div class="left_align">
                     <h3>
                        Nothing Found !!!
                    </h3>
                </div>
                <div class="right_align">
                    <a class="btn-close hover-animate" href="../"></a>
                    
                </div>
            </div>
        @elseif($msg)
            <div class="well">
                 <h4>
                    {{ $msg }}   
                </h4>
            </div>
        @endif
       
            @foreach($blogs as $blog)

                <?php
                //if($blogs=='')
                  //  echo "<h2>Nothing Found</h2>";

                $author = \App\User::select()->where('id',$blog->author_id)->first();
                $cat = \App\Category::select()->where('id',$blog->category_id)->first();
                ?>

                <div class="well">
                    <h2>
                        <a href="../post/{!! $blog->id !!}">{!! $blog->title !!}</a>
                    </h2>
                    


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
                   

                    <br>
                        <p class="well-p">
                            {!! substr($blog->body,0,550) !!}<br><br>
                            <a class="btn btn-primary" href="../post/{!! $blog->id !!}">Read More <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </p>

            </div>

                @endforeach
         
        <div align="center">{!! $blogs->render() !!}</div>


@endsection
