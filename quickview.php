<?php include("admin/config.php"); ?>
<body>
           <!-- product category -->
  <section id="aa-product-details">
  <?php
              include("admin/config.php");   
              $quickID = $_GET['id'];
              echo $quickID;  
            ?>
              

            <?php
          $sql =  "SELECT * FROM products ORDER BY id ASC";
          $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  if($row['id'] == $quickID) {
        ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="itemImage/<?php echo $row['image'] ?>">
                                          <img src="itemImage/<?php echo $row['image'] ?>" width ="250px" height ="300px" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="itemImage/<?php echo $row['image'] ?>"
                                     data-big-image="itemImage/<?php echo $row['image'] ?>">
                                      <img src="itemImage/<?php echo $row['image'] ?>">
                                  </a>                                   
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3><?php echo $row['name'] ?></h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$<?php echo $row['price'] ?></span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p><?php echo $row['description'] ?></p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                            <a class="aa-add-card-btn add-to-cart" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <a href="product-detail.php?id=<?php echo $row['id'] ?>" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>  
          </div>
        </div>
      </div>
   
    <?php }
              }
            }
            ?>
  </section>
  <!-- / product category -->

