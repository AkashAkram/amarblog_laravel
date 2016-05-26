<div class="col-md-3">

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


                            <ul class="list-unstyled well-custom-list">
                                @foreach($categories as $category)
                                    <li><a href="/bycategory/{{ $category->id }}">{!! $category->name !!}</a></li>

                                @endforeach
                            </ul>

                        <!-- /.col-lg-6 -->


                </div>

                <!-- Side Widget well-custom -->
                <div class="">
                    <br>
                    <p><center> <a href="http://akashakram.xyz"><b>Akash Akram &copy; 2016</b></a></center></p>
                </div>

            </div>


