<input type="hidden" value="{$message}" id="notify" />
{if $status==1}{literal}
    <script>
        $(document).ready(function(){
            NotifySuccess($('#notify').val());
        });
    </script>
{/literal}{/if}
{if $status==0}{literal}
    <script>
    $(document).ready(function(){
        NotifyFalse($('#notify').val());
    });
     </script>
{/literal}{/if}
<div><h3>Nhóm tin tức</h3></div>
<div class="row">
    <div class="col-md-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="data[id]" value="{$khoiphuc.id}" />
                <input class="form-control" type="text" name="data[ten_nhomtin]" value="{$khoiphuc.ten_nhomtin}" required=""/>
            </div>
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file"  class="form-control" value="{$khoiphuc.hinhanh}" name="hinhanh"/>
                {if $khoiphuc.hinhanh != ''}
                <div style="width: 200px; margin:10px 0;"><img style="max-width: 100%;" src="{$url}webroot/imgmenu/{$khoiphuc.hinhanh}"></div>
                {/if}
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-success col-md-3 " name="save" value="{$btn_val}"/>
                <a href="groupnew" class="form-control btn btn-warning col-md-2">Hủy</a>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <table class="table table-striped responsive-utilities jambo_table">
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Tên Nhóm</th>
                <th class="text-center">Ngày tạo</th>
                <th class="text-center">Tác vụ</th>
            </tr>
            {$stt=1}
            {foreach $listnhom as $nhom}
            <tr>
                <td class="text-center">{$stt++}</td>
                <td>{$nhom.ten_nhomtin}</td>
                <td>{$nhom.created|date_format:"d/m/Y"}</td>
                <td class="text-center">
                <a class="btn btn-primary btn-sm" href="?edit={$nhom.id}">
                <span class="fa fa-edit"></span>
                </a>
                <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc xóa bản tin này không?')" href="?del={$nhom.id}">
                <span class="glyphicon glyphicon-trash"></span>
                </a>
                            
                </td>
            </tr>
            {/foreach}
        </table>
    </div>
</div>