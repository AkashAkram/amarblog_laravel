@extends('layouts.app')

@section('title')
   Home
@endsection

@section('content')
    

    <div class="col-md-8">
            <!-- First Blog Post -->
         @if(count($blogs)==0)
            <div class="well">
                 <div align="right">
                    <a class="btn-close hover-animate" href="../"></a>
                    
                </div>
                <h2 align="center">Nothing Found !</h2>
            </div>
            
         @else
            @foreach($blogs as $blog)

                <?php
                //if($blogs=='')
                  //  echo "<h2>Nothing Found</h2>";

                $author = \App\User::select('name')->where('id',$blog->author_id)->first();
                $cat = \App\Category::select('name')->where('id',$blog->category_id)->first();
                ?>

                <div class="well">
                    <h2>
                        <a href="post/{!! $blog->id !!}">{!! $blog->title !!}</a>
                    </h2>
                    


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



                <hr>
            </div>

                @endforeach
          @endif
        <div align="center">{!! $blogs->render() !!}</div>
    </div>          <!-- Pageinate -->



@endsection
