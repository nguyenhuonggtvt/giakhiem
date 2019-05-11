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
                <h2>Danh sách sản phẩm</h2>
               
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                            <th style="text-align: center; width: 50px;">STT</th>
                            <th style="width: 120px;">Hình ảnh</th>
                            <th>Tên sản phẩm </th>
                            <th style="width: 100px;">Ngày tạo</th>
                            <th style="width: 120px;">Trạng thái</th>
                            <th style="width: 150px;">Loại</th>
                            <th style="width: 120px;">Tác vụ</th>
                        </tr>
                    </thead>

                    <tbody>
                    {foreach $listsp as $value}
                        <tr class="even pointer">
                            <td class="a-center ">
                                <input type="text" style="text-align: center;" size="3" data-id={$value.id} value="{$value.stt_uutien}" class="tableflat"/>
                            </td>
                            <td class=" "><img class="img-news-admin" src="{$url}webroot/imgsp/{$value.hinhanh}"/></td>
                            <td class=" ">{word_limiter($value.ten_sp, 15)}</td>
                            <td class=" ">{$value.created|date_format:"%d/%m/%Y"}</td>
                            <td style="text-align: center;">{if $value.status==1}<label class="label label-success status-new">Hiển thị</label>{else}<label class="label label-danger status-new">Ẩn</label>{/if}</td>
                            <td>{$value.tennhom}</td>
                            <td class="a-right a-right ">
                            <a class="btn btn-primary btn-sm" href="{$url}newsp?edit={$value.id}"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc xóa sản phẩm này không?')" href="?del={$value.id}"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>