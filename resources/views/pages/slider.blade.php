    
    <?php 
    $all_published_slider=DB::table('tbl_slider')
    ->where('publication_status',1)
    ->get(); 

?>  
    
</div>
<div class="jumbotron"></div>

 <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                                $all_published_slider   = DB::table('tbl_slider')
                                                        ->where('publication_status',1)
                                                        ->get();

                                                    $i=1;
                                                    foreach ($all_published_slider as $v_slider) {

                                                         if($i==1){


                            ?>
                            <div class="item active">
                            <?php } else { ?>
                                <div class="item">
                                <?php } ?>
                                <!-- slider text here -->
                                <div class="col-sm-5">
                                    <h1><span>{{$v_slider->slider_heading}}</span></h1>
                                    <p>{{$v_slider->slider_text}}</p>
                                </div>
                                <div class="col-sm-7">
                                    <img src="{{asset($v_slider->slider_image)}}" class="girl img-responsive" alt="Slider image missing" />
                                </div>
                            </div>
                            <?php $i++; } ?>
                        </div>
                    </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
    </section><!--/slider-->