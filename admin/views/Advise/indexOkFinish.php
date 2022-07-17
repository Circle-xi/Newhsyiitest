<?php
   $title=array('','已处理完成','刷新');
   $schcmd='建议类型=PC:list(Advise_type),建议状态=PC:list(Advise_status),关键字=keywords';//届=PC:list(Advise_session),次=PC:list(Advise_time),
   $coumnName='code,type,title,advise_content,reply_content,finish_time,okfinish_status';//session,time,
   $hw='';//0:5%,1:5%,2:5%,3:5%,4:10%,5:30%,6:5%,6:20%,6:5%';//每列的宽度
   $index=0;//是否显示序号 0 不显示  1 显示//html_entity_decode
   $idName='id';//关键字的属性名称//
   //cmd=内部名称：动作：图片：标题
   $cmd='编辑:updateFinish,详细信息:Advise/previewFinish::详细信息';//,题目:PisaExamsData/index::题目';//操作的命令
   $data=array($index,$idName,$coumnName,$hw,$cmd);
   hsYii_indexShow($this,$model, $title,$schcmd,$data,$arclist,$pages); 
?>
<script>
    function previewFinish(id) {
        $.dialog.open('<?php echo $this->createUrl("Advise/previewFinish"); ?>&id=' + id, {
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
