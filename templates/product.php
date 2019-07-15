<?php
    $type = $_SESSION['user_data']['user_type'];
  ?>
<div class="content-wrapper">
     <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products</h3>
              <?php if($type == '1') { ?>
               
                  <?php }else{ ?>
                  <!-- <a id="sell_add" style="color: #FFF;" href="add_product.php"><div class="btn btn-info" style="margin: 5px 30px 5px;">
                     Add
                  </div></a> -->
                  <?php } ?>
                  <div class="pull-right Search_set1"> 
                  <input type="text" class="glyphicon-search"  placeholder="Search" id="search" name="search">
                  <span class="glyphicon glyphicon-search" onclick="filterData();"></span>  
                  </div>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tblTaxList">
             <!--  <div  id="email_error"></div> -->
              <thead>
                  <th width="120">ID</th>
                  <th>Product Name</th>
                  <th>Description</th>
                  <th>Seller Name</th>
                  <th>Manage</th>                 
                </thead>
               <tbody>               
               </tbody> 
              </table>

            </div>
            <div class="container">
               <div id="Pagination" style="text-align: center;"></div> 
               <input type="hidden" value="<?php echo PAGE_SIZE;?>" name="items_per_page" id="items_per_page">
               <input type="hidden" value="<?php echo NUM_DISPLAY_ENTRIES;?>" name="num_display_entries" id="num_display_entries">
               <input type="hidden" value="Prev" name="prev_text" id="prev_text">
               <input type="hidden" value="Next" name="next_text" id="next_text">
           </div>
        </div>
       </div>
      </div>

   <script type="text/javascript">
    

var num_display_entries,items_per_page,num_entries,start;
    function pageselectCallback(page_index, jq, event_type){
        start = page_index*items_per_page
        if(typeof event_type == 'undefined')
             loadData(start,items_per_page,event_type)
        return false;
     }

     function initPagination() {
        try{
              $("#Pagination").pagination(num_entries, {
                num_display_entries: num_display_entries,
                items_per_page:items_per_page,
                callback: pageselectCallback
              });
           }
           catch(ex){}
     }
     
     $(document).ready(function(){      
        $('#search').keypress(function (e) {
              if (e.which == 13) {
                filterData();
                return false;    
              }
        });

        items_per_page = $('#items_per_page').val();
        num_display_entries = $('#num_display_entries').val();
        items_per_page = $('#items_per_page').val();
        loadData(0,items_per_page,'ready');
     });
      
     function loadData(start,per_page,event_type){
        ajaxloader.loadURL('ajax/product.php', {start:start,search:$('#search').val()}, function(res){
                 num_entries = res['total_no_records'];
                 var result = res['rst'];
                 var tr = '';
                  $.each(result, function(index, item){
                          tr += "<tr>\
                                     <td>"+item.product_id+"</td>\
                                     <td>"+item.product_name+"</td>\
                                     <td>"+item.product_desc+"</td>\
                                     <td>"+item.user_name+"</td>\
                                     <td><a class='fa fa-fw fa-edit' href='product_edit.php?product_id="+item.product_id+"''></a>&nbsp;<a type='submit' class='glyphicon glyphicon-trash' data-toggle='modal' onclick=destroy("+item.product_id+") ></a></td>\
                                     </tr>";
                  });
                  $('#tblTaxList tbody').html(tr);
                  if(!result){
                     $('#Pagination').hide();
                  }
                  else
                  {
                    $('#Pagination').show();
                  }
                  if(event_type == 'ready')
                     initPagination();
          });     
     }

     filterData = function (){
           loadData(0,$('#items_per_page').val(),'ready');
       }

function destroy($id){
     if(confirm("Are you sure you want to delete this?")){
         var data = new FormData();
         data.append("product_id", $id);
        $.ajax({
              type: 'post',
              url: 'delete_product.php',
              data: data,
              contentType: false,  
              processData: false,
              success: function (datas) {                          
                  var data_r = datas;
                  if(data_r == 1){                  
                   window.location.href = 'product.php';
                }else{
                   alert('Unsuccessfully Deleted');                                           
                   //document.getElementById("email_error").innerHTML = "Unsuccessfully Deleted";
                }
              }
            });
    }
    else{
        return false;
    } 
}

</script>