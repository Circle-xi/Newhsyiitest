<div class="box"> 
<?php 
   $title=array('','议案浏览','审核,刷新,删除,批删除');
   $schcmd='议案类型=type:list(proposal_type),日期=submit_time:date,关键字=keywords';
   $coumnName='type,title,content,author,submit_time,workstate';
   $hw='0:10%,1:10%,2:40%,3:10%,4:10%,5:10%,6:10%';//0:5%,1:5%,2:5%,3:5%,4:10%,5:30%,6:5%,6:20%,6:5%';//每列的宽度
   $index=0;//是否显示序号 0 不显示  1 显示//html_entity_decode
   $idName='id';//关键字的属性名称//
   //cmd=内部名称：动作：图片：标题
   $cmd='编辑:updateJudge,删除,详细信息:proposal/preview2';//,题目:PisaExamsData/index::题目';//操作的命令
   $data=array($index,$idName,$coumnName,$hw,$cmd);
   hsYii_indexShow($this,$model, $title,$schcmd,$data,$arclist,$pages); 
?>
</div><!--box end-->

<script>
    function preview(id) {
        $.dialog.open('<?php echo $this->createUrl("proposal/preview2"); ?>&id=' + id, {
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