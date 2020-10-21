
<?php 
include("header.php");
include("admin/config.php");

?>

              <div class="aa-product-catg-head-right">
              
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div id="message"></div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">

              <?php
                $color = $_GET['id'];
                
                $sql =  "SELECT * FROM products ORDER BY id  ";
                $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        if($row['color'] == $color) {
            ?>

                <!-- start single product item -->
                <li>
                  <figure>
                  <form action="" class="form-submit">

                    <input type	= "hidden" class="pid" value= "<?php echo $row["id"];?>"/>	
                    <input type	= "hidden" class="pname" value= "<?php echo $row["name"];?>"/>
                    <input type= "hidden" class="pprice" value= "<?php echo $row["price"];?>"/>
                    <input type= "hidden" class="pimage" value= "<?php echo $row["image"];?>"/>
                    

                    <a class="aa-product-img" href="#"><img src="itemImage/<?php echo $row["image"];?>" alt="polo shirt img" width ="250px" height ="300px"></a>
                    
        <!--            <button class="aa-add-card-btn add-to-cart"><span class="fa fa-shopping-cart"></span>Add To Cart</button>  -->
                    <a class="aa-add-card-btn add-to-cart" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $row["name"];?></a></h4>
                      <span class="aa-product-price">$<?php echo $row["price"];?>.00</span><span class="aa-product-price"></span>
                    </figcaption>
                  </form>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                  <a href="product-detail.php?id=<?php echo $row['id'] ?>" data-placement="top" title="Quick View" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                  </div>
                </li>
                <!-- start single product item -->
<?php	         }
            }
        }
?>
            </ul>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript" src="assets/jquery-3.5.1.min.js"></script>
            <script>
              $(document).ready(function(){
                $(".add-to-cart").click(function(e){
                  e.preventDefault();
                  var $form = $(this).closest(".form-submit");
                  
                  var pid = $form.find(".pid").val();
                  var pname = $form.find(".pname").val();
                  var pprice = $form.find(".pprice").val();
                  var pimage = $form.find(".pimage").val();

                  $.ajax({
                    url: 'add-to-cart.php',
                    method: 'post',
                    data: {pid:pid, pname:pname, pprice:pprice, pimage:pimage},
                    success:function(response){
                      $("#message").html(response);
                    
                    }
                  });
                });
              });
              </script> 


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
                      <?php
                            $sql =  "SELECT * FROM products ORDER BY id ASC LIMIT 10 ";
                            $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {
                      ?> 
                                    <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="itemImage/<?php echo $row["image"];?>">
                                          <img src="itemImage/<?php echo $row["image"];?>" alt="polo shirt img" width ="250px" height ="300px" class="simpleLens-big-image">
                                      </a>
                                   </div>
                        <?php     }
                              }
                    ?>
                                </div>
                              </div>
                          </div>
                        </div>
                        
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            
                          <div class="aa-product-view-content">

                          
                        <?php
                            $sql =  "SELECT * FROM products ORDER BY id ASC LIMIT 10 ";
                            $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {
                      ?> 
                            <h3><?php echo $row["name"];?></h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$<?php echo $row["price"];?>.00</span>
                              <p class="aa-product-avilability">Availability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
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
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>

                            <?php     }
                              }
                    ?>
                          </div>

                        
                        </div>

                        
                      </div>
                    </div>  
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="menProduct.php">1</a></li>
                  <li><a href="menP2.php">2</a></li>
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
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                <li><a href="menProduct.php">Men</a></li>
                <li><a href="womanProduct.php">Women</a></li>
                <li><a href="kidProduct.php">Kids</a></li>
                <li><a href="electronicsProduct.php">Electornics</a></li>
                <li><a href="sportProduct.php">Sports</a></li>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
              <a href="tagname.php?id=<?php echo 'Fashion'?>">Fashion</a>
                <a href="tagname.php?id=<?php echo 'Ecommerce'?>">Ecommerce</a>
                <a href="tagname.php?id=<?php echo 'Shop'?>">Shop</a>
                <a href="tagname.php?id=<?php echo 'Hand Bag'?>">Hand Bag</a>
                <a href="tagname.php?id=<?php echo 'Laptop'?>">Laptop</a>
                <a href="tagname.php?id=<?php echo 'Headphone'?>">Head Phone</a>
              </div>
            </div>
            
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">0.00</span>
                 <span id="skip-value-upper" class="example-val">3000.00</span>
                 <button class="aa-filter-btn" type="submit">Filter</button>
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <a class="aa-color-green" href="colors.php?id=<?php echo 'green'?>"></a>
                <a class="aa-color-yellow" href="colors.php?id=<?php echo 'yellow'?>"></a>
                <a class="aa-color-pink" href="colors.php?id=<?php echo 'pink'?>"></a>
                <a class="aa-color-purple" href="colors.php?id=<?php echo 'purple'?>"></a>
                <a class="aa-color-blue" href="colors.php?id=<?php echo 'blue'?>"></a>
                <a class="aa-color-orange" href="colors.php?id=<?php echo 'orange'?>"></a>
                <a class="aa-color-gray" href="colors.php?id=<?php echo 'grey'?>"></a>
                <a class="aa-color-black" href="colors.php?id=<?php echo 'black'?>"></a>
                <a class="aa-color-white" href="colors.php?id=<?php echo 'white'?>"></a>
                <a class="aa-color-cyan" href="colors.php?id=<?php echo 'cyan'?>"></a>
                
        
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>


    

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 
 
  </body>
</html>