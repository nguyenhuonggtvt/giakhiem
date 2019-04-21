{literal}
<script>
$(document).ready(function(){
     $('input.stt').change(function(){
        $.ajax({
           type:'post',
           url:gb_url+'admin/c_slide/update_stt',
           data:{'id':$(this).data('id'),'value':$(this).val()},
           success:function(){
              NotifySuccess("Cập nhập thứ thứ tự thành công, hãy kiểm chứng lại slide của website")
           } 
        });
    }); 
});
</script>
{/literal}
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
         <form method="POST" enctype="multipart/form-data">
           <h2>Quản lý ảnh slide</h2>
           <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <input type="hidden" class="stt" name="data[id]" data-id={$khoiphuc.id} value="{$khoiphuc.id}"/>
                <label class="control-label"><h4><b>Tiêu đề</b></h4></label><br />
                <input class="form-control" required="" maxlength="100" name="data[title_img]" value="{$khoiphuc.title_img}"/><br />
                <label class="control-label"><h4><b>Link</b></h4></label><br />
                <input class="form-control" required="" name="data[link_href]" value="{$khoiphuc.link_href}"/><br />
                <label class="control-label"><h4><b>Hình ảnh</b></h4></label><br />
                <input class="form-control" name="anhdaidien" type="file"/><br />
                <input type="submit" name="save" value="Lưu lại" class="btn btn-success"/>
            </div>
         </div>    
        </form> 
    </div>
</div>
<br />
<br />
<br />
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table-condensed table-bordered table-striped">
        <tr>
            <td style="width: 20px;"><b>STT</b></td>
            <td style="width: 600px;"><b>Hình ảnh</b></td>
            <td style="width: 200px;"><b>Tiêu đề</b></td>
            <td style="width: 200px;"><b>Link</b></td>
            <td style="width: 150px;"><b>Tác vụ</b></td>
        </tr>
        {foreach $slides as $value}
        <tr>
            <td><input data-id={$value.id} class="stt"  style="text-align: center;" type="number" min="0" value="{$value.stt}"/></td>
            <td><img class="img-responsive" src="{$url}webroot/frontend/img_slide/{$value.name_img}" /></td>
            <td>{$value.title_img}</td>
            <td>{$value.title_img}</td>
            <td><a href="?del={$value.id}"><i class="btn btn-danger btn-xs glyphicon glyphicon-trash"></i></a></td>
        </tr>
        {/foreach}
        </table>
    </div>
</div>
