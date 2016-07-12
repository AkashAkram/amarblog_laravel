         <!-- Blog Search well-custom -->
                <div class="well-custom">
                    <h4>Blog Search</h4>
                    <div class="input-group noMarginX">
                        <form action="search" method="get">
                            <div class="row">
                                <div class="col-md-11 noMarginX">
                                    <input type="text" class="form-control" name="query">
                                </div>
                                <div class="col-md-1 noMarginX">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories well-custom-custom -->
                <div class="well-custom">
                    <h4>Blog Categories</h4>
                        <div class="row noMarginX">
                        @foreach($categories as $category)
                            <div class="col-md-6">
                              <div class="transparent">
                                  <a href="/bycategory/{{ $category->id }}">{!! $category->name !!}</a>
                              </div>
                            </div>
                        @endforeach
                        </div>


                </div>

                <!-- Side Widget well-custom -->
                <div class="">
                    <br>
                    <p><center> <a href="http://akashakram.xyz"><b>Akash Akram &copy; 2016</b></a></center></p>
                </div>

