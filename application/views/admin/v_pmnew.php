
<style>
.img-news-admin{
    max-width: 50px;
    
}
label.status-new{
    padding: 5px 10px;
}
#ZeroClipboard_TableToolsMovie_1{
    display: none;
}
</style>
<script>
    $(document).ready(function(){
       $('div.DTTT_container').hide(); 
    });
</script>
{if $status==1}{literal}
    <script>
        $(document).ready(function(){
            NotifySuccess('Xóa thành công!');
        });
    </script>
{/literal}{/if}
{if $status==0}{literal}
    <script>
    $(document).ready(function(){
        NotifyFalse('Có lỗi, xin hãy thử lại!');
    });
     </script>
{/literal}{/if}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách bài viết</h2>
               
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                            <th style="text-align: center; width: 50px;">STT</th>
                            <th style="width: 120px;">Hình ảnh</th>
                            <th style="width: 150px;">Tiêu đề </th>
                            <th>Mô tả</th>
                            <th style="width: 100px;">Nhóm tin</th>
                            <th style="width: 100px;">Ngày tạo</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 120px;">Tác vụ</th>
                        </tr>
                    </thead>

                    <tbody>
                    {foreach $listnew as $new}
                        <tr class="even pointer">
                            <td class="a-center ">
                                <input type="text" style="text-align: center;" size="3" data-id={$new.id} value="{$new.tt_uutien}" class="tableflat"/>
                            </td>
                            <td class=" "><img class="img-news-admin" src="{$url}webroot/imgnew/{$new.anhdaidien}"/></td>
                            <td class=" ">{$new.tieude}</td>
                            <td class=" ">{word_limiter($new.mota, 15)} </td>
                            <td>{word_limiter($new.ten_nhomtin, 15)}</td>
                            <td class=" ">{$new.created|date_format:"%d/%m/%Y"}</td>
                            <td style="text-align: center;"> {if $new.status==1}<label class="label label-success status-new">Hiển thị</label>{else}<label class="label label-danger status-new">Ẩn</label>{/if}</td>
                            <td class="a-right a-right ">
                            <a class="btn btn-primary btn-sm" href="{$url}news?edit={$new.id}"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc xóa bản tin này không?')" href="?del={$new.id}"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
   $('div.DTTT_container').hide(); 
});
</script>