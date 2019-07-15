<?php
  include(dirname(dirname(__FILE__)).'/include/includes.php');
  $orderlist = new Order;
  if(!empty($_REQUEST['search'])){
       $rst = $orderlist->getOrderBySearch($_REQUEST['search'],['id']);
       $arr_rst['total_no_records'] = count($rst);
       $rst = $orderlist->getOrderBySearch($_REQUEST['search'],'*', $_REQUEST['start']);
       $arr_rst['rst'] = $rst;
       echo json_encode($arr_rst);
  } 
  else
  {
       $rst = $orderlist->getOrder(['id']);
       $arr_rst['total_no_records'] = count($rst);
       $rst = $orderlist->getOrder('*', $_REQUEST['start']);
       $arr_rst['rst'] = $rst;
       echo json_encode($arr_rst);
  }
?>