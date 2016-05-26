@extends('layouts.app')

@section('title')
    Update post
@endsection


@section('title')
    <style type="text/css">
        .post{
            width: 339px;
            height: 150px;
        }
    </style>
@endsection
@section('content')


                <?php

               
                $pre_cat = \App\Category::select('name')->where('id',$blog->category_id)->first();
                ?>



            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="well-header">
                            <div class="left_align">
                                  <h4>Update</h4>
                            </div>
                            <div class="right_align">
                                <a class="btn-close hover-animate" href="/"></a>
                                
                            </div>
                         </div>
           
                 <br>

                   </div>

                    <div class="panel-body">

                        <div>
                            <form class="form-horizontal" action="/update/post/{!! $blog->id !!}" role="form" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{!! $blog->title !!}" name="title">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label">Catagory</label>
                                    <div class="col-md-6">
                                        <select name="category_id"  class="form-control">
                                            <option value="{{ $blog->category_id }}" selected>{{ $pre_cat->name }}</option>
                                            @foreach($categories as $cat)
                                                @if($cat->id != $blog->category_id)
                                                    <option value="{!! $cat->id !!}">{!! $cat->name !!}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Current Image</label>
                                    <div class="col-md-6">
                                        <img class="img-responsive post_image" src="/post_images/{!! $blog->cover !!}" width="900" height="300" alt="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Cover</label>
                                    <div class="col-md-6">
                                        <input type="file" class="" name="image">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Article</label>
                                    <div class="col-md-6">
                                        <textarea  class="form-control" value="" name="body" required>{!! $blog->body !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" value="update" id="post" name="updateButton">
                                            Update
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </div>

@endsection
