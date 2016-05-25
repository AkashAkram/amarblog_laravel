@extends('layouts.app')
@section('title')
    New Post
@endsection
@section('style')
    <style type="text/css">
        .post{
            width: 339px;
            height: 150px;
        }
    </style>
@endsection
@section('content')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="well-header">
                            <div class="left_align">
                                  <h4>New Post</h4>
                            </div>
                            <div class="right_align">
                                <a class="btn-close hover-animate" href="../"></a>
                                
                            </div>
                         </div>
           
                 <br>
                    </div>

                    <div class="panel-body">

                        <div>
                            <form class="form-horizontal" action="/" role="form" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="" name="title" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="hidden" class="form-control" name="author" value="{!! Auth::user()->id !!}" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Category</label>
                                    <div class="col-md-6">
                                        <select name="category_id" id="" class="form-control">
                                            @foreach($categories as $cat)
                                                <option value="{!! $cat->id !!}">{!! $cat->name !!}</option>
                                            @endforeach
                                        </select>
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
                                        <textarea  class="form-control" name="body" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" id="post" name="postButton">
                                            Post it Now
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </div>

@endsection
