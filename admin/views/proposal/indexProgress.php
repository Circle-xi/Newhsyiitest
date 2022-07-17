<div class="box"> 
   <?php 
       $title=array('','议案搜索','刷新,删除,批删除');
       $schcmd='议案类型=type:list(proposal_type),日期=PDATE:date,关键字=keywords';
       $coumnName='type,title,company_name,company_contact,supervision_company,workstate';
       $hw='0:10%,1:30%,2:10%,3:10%,4:10%,5:10%,6:10%';//0:10%,1:7%,2:17%,3:70%,7:10%,7:7%,7:7%';//每列的宽度
       $index=0;//是否显示序号 0 不显示  1 显示
       $idName='id';//关键字的属性名称
       $cmd='编辑:updateProgress,删除,详细信息:proposal/preview4';//操作的命令
       $data=array($index,$idName,$coumnName,$hw,$cmd);
       hsYii_indexShow($this,$model, $title,$schcmd,$data,$arclist,$pages); 
   ?>
</div><!--box end-->
<script>
    function preview(id) {
        $.dialog.open('<?php echo $this->createUrl("proposal/preview4"); ?>&id=' + id, {
            id: 'order',
            lock: true,
            opacity: 0.3,
            title: '预览',
            width: '70%',
            height: '100%',
            close: function() {we.reload();}
        });
    }
</script> 