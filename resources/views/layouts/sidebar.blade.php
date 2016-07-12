<div >

                <!-- Blog Search well-custom -->
                <div class="well-custom">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories well-custom-custom -->
                <div class="well-custom">
                    <h4>Blog Categories</h4>
                        <div class="row">
                        @foreach($categories as $category)
                            <div class="col-md-6">
                              <a href="/bycategory/{{ $category->id }}">{!! $category->name !!}</a>
                            </div>
                        @endforeach
                        </div>


                </div>

                <!-- Side Widget well-custom -->
                <div class="">
                    <br>
                    <p><center> <a href="http://akashakram.xyz"><b>Akash Akram &copy; 2016</b></a></center></p>
                </div>

            </div>


