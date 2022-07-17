 <?php  
  $title=array('审核受理','返回:index');
  $inputCmd='1:3=code:label;submit_time:label;type:label;title:label;advise_content:label;is_accept:YN';//session:PC:list(Advise_session):1:1,time:PC:list(Advise_time):1:1;
  $comstr=array('审核不通过:baocun,审核通过:Advise/indexAssign','取消:index');//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);
 ?>
 