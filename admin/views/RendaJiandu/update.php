 <?php  
  $title='工作监督意见';
  $inputCmd='1:3=code:label;type:label;content:label;apartment:list(ApartmentType):1:1,supervise:list(JianduType):1:1;time:time:1:1,progress:1:1;suggest;press:YN;';
  $comstr='保存:baocun';//保存的个相关操作，标题:命令
  hsYii_updateData( $this,$model,$inputCmd,$title,$comstr);
 ?>

 