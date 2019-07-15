<?php
 $type = $_SESSION['user_data']['user_type'];
?>
<aside class="main-sidebar">
   <section class="sidebar">
     <ul class="sidebar-menu" data-widget="tree">
        <li id="main_0">
            <a href="index.php" onclick="clickMenu(this);">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li id="main_4">
            <a href="get_user.php" onclick="clickMenu(this);"><i class="fa fa-files-o"></i><span>Users</span></a>
        </li>
        
         <li class="treeview" id="main_2">
              <a href="#" onclick="clickMenu(this);">
                <i class="fa fa-files-o"></i>
                <span>Stock</span>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">3</span>
                </span>
              </a>
              <?php if($type == '2') { ?>
              <ul class="treeview-menu">
    			       <!-- <li id="main_2_1"><a href="category.php" onclick="clickMenu(this);"><i class="fa fa-circle-o"></i>category</a></li> -->
    			      <!--  <li id="main_2_2"><a href="attribute.php" onclick="clickMenu(this);"><i class="fa fa-circle-o"></i>Attribute</a></li>	 -->
    			       
                 <li id="main_2_3"><a href="product.php" onclick="clickMenu(this);"><i class="fa fa-circle-o"></i>Product</a></li>
                 
             </ul>
             <?php }else{ ?>
              <ul class="treeview-menu">
                 <li id="main_2_1"><a href="category.php" onclick="clickMenu(this);"><i class="fa fa-circle-o"></i>category</a></li>
                 <!-- <li id="main_2_2"><a href="attribute.php" onclick="clickMenu(this);"><i class="fa fa-circle-o"></i>Attribute</a></li> -->  
                 
                 <li id="main_2_3"><a href="product.php" onclick="clickMenu(this);"><i class="fa fa-circle-o"></i>Product</a></li>
                 
             </ul>
             <?php } ?>
		    </li>
        <!--<li id="main_3">
            <a href="order.php" onclick="clickMenu(this);"><i class="fa fa-files-o"></i><span>Order</span></a>
        </li> -->

      </ul>
     </li>        
   </ul>
  </section>
</aside>

<script type="text/javascript">
    function clickMenu(object){
        localStorage.setItem("selected_node", $(object).parent().attr('id'));
    }
    
    /*This is only work on logout and home logo*/
    function removeMenu(){
        localStorage.removeItem("selected_node");
    }

   
    if(localStorage.getItem("selected_node") == null || localStorage.getItem("selected_node") == 'main_0'){
       $('#main_0').addClass('active');
    }
    else
    {
       $('#'+localStorage.getItem("selected_node")).addClass('active');
       if($('#'+localStorage.getItem("selected_node")).parent().attr('class') == 'treeview-menu'){
           $('#'+localStorage.getItem("selected_node")).parent().parent().addClass('menu-open');
           $('#'+localStorage.getItem("selected_node")).parent().css('display','block');
       }
    }
</script>
