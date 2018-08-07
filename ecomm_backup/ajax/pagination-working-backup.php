<?php require_once("../adminpanel/lib/helper.php");
$item_per_page      = 9;
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}
//get total number of records from database
$results= $obj->select("*","Products", "1");
$get_total_rows =COUNT($results); //hold total records in variable
//break records into pages
$total_pages = ceil($get_total_rows/$item_per_page);

//position of records
$page_position = (($page_number-1) * $item_per_page);

//Limit our results within a specified range. 

$results= $obj->select("*","Products", "1 ORDER BY product_id ASC LIMIT $page_position ,$item_per_page");
//$results = $mysqli->prepare("SELECT id, name, message FROM paginate ORDER BY id ASC LIMIT $page_position, $item_per_page");
// $results->execute(); //Execute prepared Query
// $results->bind_result($id, $name, $message); //bind variables to prepared statement

//Display records fetched from database.

if(is_array($results)){
	foreach($results as $productlist){
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
            <div class="clearfix"></div>
            <div class="col-md-12 text-center">
            	<?php
            	echo paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages);
            	?>
            </div>
            <?php
            // echo '<ul class="contents">';
            // while($results->fetch()){ //fetch values
            // 	echo '<li>';
            // 	echo  $id. '. <strong>' .$name.'</strong> &mdash; '.$message;
            // 	echo '</li>';
            // }
            // echo '</ul>';

            // echo '<div align="center">';
            // To generate links, we call the pagination function here. 


            ?>

            <?php
            function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
            {

            	$pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
    	

    	$pagination .= '<ul class="pagination">';

    	$right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){

        	$previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                	if($i > 0){
                		$pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                	}
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
        	$pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
        $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
        	$pagination .= '<li class="active">'.$current_page.'</li>';
        }

        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
        	if($i<=$total_pages){
        		$pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
        	}
        }
        if($current_page < $total_pages){ 
        	$next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
            }

            $pagination .= '</ul>'; 
        }

    return $pagination; //return pagination links
}
?>