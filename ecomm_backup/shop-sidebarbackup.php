<?php require_once("includes/header.php");
require_once("adminpanel/lib/helper.php");?>
<style type="text/css">
    .checkbox-btn{
        background: transparent;
        border: none;
        color: #adadad;
        padding-left: 0px;
        font-size: 14px;
        text-transform: capitalize;
        font-weight: normal;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    i.state-icon.fa.fa-check-square-o {
        font-size: 20px;
        margin-right: 6px;
    }
    .checkbox-btn:hover, .checkbox-btn:active, .checkbox-btn, .checkbox-btn.active:focus, .checkbox-btn:visited, .checkbox-btn.active, .checkbox-btn:focus{
      background: transparent!important;
      border: none!important;
      color: #adadad!important;
      box-shadow: none !important;
      outline: none;
  }
  .button-checkbox button i{
    color: #444;
    font-size: 22px;
    margin-right: 10px;
}
.button-checkbox{
    display: block;
}
#sidebar .widget-title h4, .blog-desc h3 a, .blog-desc h3 {
    padding: 0;
    margin: 0;
    color: #111111;
    font-size: 12px;
    font-weight: 100;
    text-transform: uppercase;
}
/*.rating{
    display: none;
}*/
</style>
<section class="section banner nopadbot" style="background-image:url('upload/parallax_02.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
    <div class="overlay"></div>
    <div class="container">
        <div class="page-header">
            <div class="bread">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Products</li>
                </ol>
            </div><!-- end bread -->
            <h1>Products</h1>
        </div>
    </div>
</section>

<section class="section border-top">
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-9 col-xs-12 pull-right">
                <div class="row shop-top">
                    <div class="col-md-6">
                        <p class="woocommerce-result-count">Showing 1&ndash;12 of 221 results</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="catalog-order">
                            <select name="orderby" class="selectpicker">
                                <option value="popularity" >Sort by popularity</option>
                                <option value="rating" >Sort by average rating</option>
                                <option value="date"  selected='selected'>Sort by newness</option>
                                <option value="price" >Sort by price: low to high</option>
                                <option value="price-desc" >Sort by price: high to low</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row shop-catalog">
                  <?php
                  $display_products = $obj->select("*","Products", "1 LIMIT 12");
                  if(is_array($display_products)){
                    foreach($display_products as $productlist){
                        $pid= $productlist['product_id'];
                       $encrypted_id = base64_encode($pid);
                       ?>

                       <div class="col-md-4 col-sm-6">
                        <div class="shop-item">   
                            <div class="entry">
                                <div class="left-button">
                                    <h4>New!</h4>
                                </div>
                                <a class="hover-image" href="single-product.php?product_id=<?php echo $encrypted_id?>" title="">
                                    <div class="img-rotate">
                                        <img src="<?php echo $productlist['product_image_link']?>" class="img-responsive" alt="">
                                        <img src="<?php echo $productlist['product_image_link']?>" class="img-responsive rotate-image" alt="">
                                    </div>  
                                </a>
                                <div class="shop-item-title clearfix">
                                    <h4><a href="single-product.php?product_id=<?php echo $encrypted_id?>"><?php echo $productlist['product_title']?></a></h4>
                                    <div class="shopmeta clearfix">
                                       <!--  <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div> --><!-- end rating -->
                                        <span><i class="fa fa-rupee"></i><?php echo $productlist['product_selling_price']?> <strike> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $productlist['product_mrp']?></strike></span> 
                                        <a href="#" class="btn custombutton button--isi btn-primary">ADD TO CART</a>
                                    </div><!-- end shop-meta -->
                                </div><!-- end shop-item-title -->
                                <!-- <div class="visible-buttons">
                                    <a data-tooltip="tooltip" data-placement="top" title="Add to Wishlist" href="shop-wishlist.html"><span class="fa fa-heart"></span></a>
                                    <a data-tooltip="tooltip" data-placement="top" title="Add to Compare" href="shop-compare.html"><span class="fa fa-star"></span></a>
                                    <a data-toggle="modal" data-target="#ViewModal" data-tooltip="tooltip" data-placement="top" title="Quick View" href="#"><span class="fa fa-eye"></span></a>
                                </div> --><!-- end buttons -->
                            </div><!-- entry -->
                        </div><!-- end relative -->
                    </div><!-- end col -->
                    <?php
                }
            }
            ?>
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <nav>
                    <ul class="pagination">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                          <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div><!-- end content -->

<div id="sidebar" class="col-md-3 col-sm-12 pull-left">
    <div class="widget">
        <div class="widget-title">
            <h4>Filter by Product</h4>
            <hr>
        </div><!-- end widget-title -->
        <?php
        $get_category = $obj->select("Distinct category_master.category_name ","category_master","category_status='1'");
        if(is_array($get_category)){
            foreach($get_category as $cat_val){
                ?>

                <span class="button-checkbox">
                    <button type="button" class="btn checkbox-btn" data-color="primary"><?php echo $cat_val['category_name']?></button>
                    <input type="checkbox" class="hidden" />
                </span>
                <?php
            }
        } 
        ?>

    </div>
    <div class="widget">
        <div class="widget-title">
            <h4>Filter by Brand</h4>
            <hr>
        </div><!-- end widget-title -->
        <?php
        $get_brands = $obj->select("*","brand_master","brand_status='1'");
        if(is_array($get_brands)){
            foreach($get_brands as $brands_val){
                ?>

                <span class="button-checkbox">
                    <button type="button" class="btn checkbox-btn" data-color="primary"><?php echo $brands_val['brand_name']?></button>
                    <input type="checkbox" class="hidden" />
                </span>
                <?php
            }
        } 
        ?>
    </div>
    <div class="widget">
        <div class="widget-title">
            <h4>Filter by Design/ Category</h4>
            <hr>
        </div><!-- end widget-title -->
        <?php
        $get_designs = $obj->select("Distinct design_master.design_name","design_master","design_status='1'");
        if(is_array($get_designs)){
            foreach($get_designs as $design_val){
                ?>

                <span class="button-checkbox">
                    <button type="button" class="btn checkbox-btn" data-color="primary"><?php echo $design_val['design_name']?></button>
                    <input type="checkbox" class="hidden" />
                </span>
                <?php
            }
        } 
        ?>

    </div>
    <div class="widget">
        <div class="widget-title">
            <h4>Filter by Style Guide</h4>
            <hr>
        </div><!-- end widget-title -->
        <?php
        $get_style = $obj->select("Distinct products.product_style_guide_cat","products","product_status='1' ORDER BY RAND() LIMIT 20");
        if(is_array($get_style)){
            foreach($get_style as $style_val){
                ?>

                <span class="button-checkbox">
                    <button type="button" class="btn checkbox-btn" data-color="primary"><?php echo $style_val['product_style_guide_cat']?></button>
                    <input type="checkbox" class="hidden" />
                </span>
                <?php
            }
        } 
        ?>

    </div>

</div><!-- end sidebar -->
</div><!-- end row -->
</div><!-- end container -->
</section>     



<section class="section btop">
    <div class="container">
        <div class="row shop-widget-wrapper">
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Best sellers</h4>
                        <hr>
                    </div><!-- end widget-title -->

                    <div class="shopwidget">
                        <ul class="shop-list">
                            <li>
                                <div class="entry alignleft">
                                    <img src="http://placehold.it/80x80" alt="">
                                    <div class="magnifier">
                                        <div class="visible-buttons">
                                            <span><a href="#" title=""><i class="fa fa-shopping-cart"></i></a></span>
                                        </div>
                                    </div><!-- end magnifier -->
                                </div><!-- end entry -->
                                <h3><a href="#" title="">Product Name</a></h3>
                                <small>Category Name</small>
                                <span class="new-price"><i class="fa fa-rupee"></i> 122.99</span>
                            </li>
                            <li>
                                <div class="entry alignleft">
                                    <img src="http://placehold.it/80x80" alt="">
                                    <div class="magnifier">
                                        <div class="visible-buttons">
                                            <span><a href="#" title=""><i class="fa fa-shopping-cart"></i></a></span>
                                        </div>
                                    </div><!-- end magnifier -->
                                </div><!-- end entry -->
                                <h3><a href="#" title="">Product Name</a></h3>
                                <small>Category Name</small>
                                <span class="new-price"><i class="fa fa-rupee"></i> 122.99</span>
                            </li>
                            <li>
                                <div class="entry alignleft">
                                    <img src="http://placehold.it/80x80" alt="">
                                    <div class="magnifier">
                                        <div class="visible-buttons">
                                            <span><a href="#" title=""><i class="fa fa-shopping-cart"></i></a></span>
                                        </div>
                                    </div><!-- end magnifier -->
                                </div><!-- end entry -->
                                <h3><a href="#" title="">Product Name</a></h3>
                                <small>Category Name</small>
                                <span class="new-price"><i class="fa fa-rupee"></i> 122.99</span>
                            </li>
                        </ul><!-- end blog list -->
                    </div><!-- end blogwidget -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <div class="widget-title">
                        <h4>New Arrivals</h4>
                        <hr>
                    </div><!-- end widget-title -->

                    <div class="shopwidget">
                        <ul class="shop-list">
                            <li>
                                <div class="entry alignleft">
                                    <img src="http://placehold.it/80x80" alt="">
                                    <div class="magnifier">
                                        <div class="visible-buttons">
                                            <span><a href="#" title=""><i class="fa fa-shopping-cart"></i></a></span>
                                        </div>
                                    </div><!-- end magnifier -->
                                </div><!-- end entry -->
                                <h3><a href="#" title="">Product Name</a></h3>
                                <small>Category Name</small>
                                <span class="new-price"><i class="fa fa-rupee"></i> 122.99</span>
                            </li>
                            <li>
                                <div class="entry alignleft">
                                    <img src="http://placehold.it/80x80" alt="">
                                    <div class="magnifier">
                                        <div class="visible-buttons">
                                            <span><a href="#" title=""><i class="fa fa-shopping-cart"></i></a></span>
                                        </div>
                                    </div><!-- end magnifier -->
                                </div><!-- end entry -->
                                <h3><a href="#" title="">Product Name</a></h3>
                                <small>Category Name</small>
                                <span class="new-price"><i class="fa fa-rupee"></i> 122.99</span>
                            </li>
                            <li>
                                <div class="entry alignleft">
                                    <img src="http://placehold.it/80x80" alt="">
                                    <div class="magnifier">
                                        <div class="visible-buttons">
                                            <span><a href="#" title=""><i class="fa fa-shopping-cart"></i></a></span>
                                        </div>
                                    </div><!-- end magnifier -->
                                </div><!-- end entry -->
                                <h3><a href="#" title="">Product Name</a></h3>
                                <small>Category Name</small>
                                <span class="new-price"><i class="fa fa-rupee"></i> 122.99</span>
                            </li>
                        </ul><!-- end blog list -->
                    </div><!-- end blogwidget -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Popular Items</h4>
                        <hr>
                    </div><!-- end widget-title -->

                    <div class="shopwidget">
                        <ul class="shop-list">
                           <li>
                            <div class="entry alignleft">
                                <img src="http://placehold.it/80x80" alt="">
                                <div class="magnifier">
                                    <div class="visible-buttons">
                                        <span><a href="#" title=""><i class="fa fa-shopping-cart"></i></a></span>
                                    </div>
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <h3><a href="#" title="">Product Name</a></h3>
                            <small>Category Name</small>
                            <span class="new-price"><i class="fa fa-rupee"></i> 122.99</span>
                        </li>
                        <li>
                            <div class="entry alignleft">
                                <img src="http://placehold.it/80x80" alt="">
                                <div class="magnifier">
                                    <div class="visible-buttons">
                                        <span><a href="#" title=""><i class="fa fa-shopping-cart"></i></a></span>
                                    </div>
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <h3><a href="#" title="">Product Name</a></h3>
                            <small>Category Name</small>
                            <span class="new-price"><i class="fa fa-rupee"></i> 122.99</span>
                        </li>
                        <li>
                            <div class="entry alignleft">
                                <img src="http://placehold.it/80x80" alt="">
                                <div class="magnifier">
                                    <div class="visible-buttons">
                                        <span><a href="#" title=""><i class="fa fa-shopping-cart"></i></a></span>
                                    </div>
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <h3><a href="#" title="">Product Name</a></h3>
                            <small>Category Name</small>
                            <span class="new-price"><i class="fa fa-rupee"></i> 122.99</span>
                        </li>
                    </ul><!-- end blog list -->
                </div><!-- end blogwidget -->
            </div><!-- end widget -->
        </div><!-- end col -->

        <div class="col-md-3 col-sm-6">
            <div class="widget">
                <div class="widget-title">
                    <h4>Subscribe Us</h4>
                    <hr>
                </div><!-- end widget-title -->

                <form class="newsletter" method="post"> 
                    <input class="form-control" type="text" name="username" placeholder="Username"> 
                    <input class="form-control" type="email" name="username" placeholder="Email Address"> 
                    <button type="submit" class="btn custombutton button--isi btn-primary">Subscribe</button>
                </form> 

                <div class="infobox"> 
                    <i class="fa fa-dollar alignleft"></i>
                    <h4>Money Back Guarantee</h4>
                    <p>100% money back guarantee.</p>
                </div>

                <div class="infobox"> 
                    <i class="fa fa-comments-o alignleft"></i>
                    <h4>Online Support</h4>
                    <p>We offer professional support.</p>
                </div><!-- end msidebar -->
            </div><!-- end widget -->
        </div><!-- end col -->
    </div>
</div><!-- end container -->
</section>
<?php require_once("includes/footer.php");?>
<script type="text/javascript">
    $(function () {
        $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
        $button = $widget.find('button'),
        $checkbox = $widget.find('input:checkbox'),
        color = $button.data('color'),
        settings = {
            on: {
                icon: 'fa fa-check-square-o'
            },
            off: {
                icon: 'fa fa-square-o'
            }
        };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
            .removeClass()
            .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                .removeClass('btn-default')
                .addClass('btn-' + color + ' active');
            }
            else {
                $button
                .removeClass('btn-' + color + ' active')
                .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
    });
</script>
</body>

</html>