<script type="text/javascript" src="{$url}webroot/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{$url}webroot/ckeditor/core.js"></script>
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

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
             
               <h2>Danh mục nhóm sản phẩm</h2>
               <div class="clearfix"></div>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="x_content">
                    <div class="form-group">
                        <input type="hidden" name="data[id]" value="{$khoiphuc.id}" />
                        <label class="">Tên danh mục</label>
                        <input class="form-control" type="text" name="data[tennhom]" value="{$khoiphuc.tennhom}" required=""/>
                    </div>
                    <div class="form-group">
                        <label class="">Mô tả</label><br />
                        <input type="text" name="data[mota]" value="{$khoiphuc.mota}" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file"  class="form-control" value="{$khoiphuc.hinhanh}" name="hinhanh"/>
                        {if $khoiphuc.hinhanh != ''}
                        <div style="width: 200px; margin:10px 0;"><img style="max-width: 100%;" src="{$url}webroot/imgmenu/{$khoiphuc.hinhanh}"></div>
                        {/if}
                    </div>
                    <div class="form-group">
                        <label class="">Nội dung</label><br />
                        <textarea id="content_intro" name="data[noidung]">
                         {$khoiphuc.noidung}
                        </textarea><br />
                        <input type="submit" class="btn btn-success" name="save" value="{$btn_val}"/>
                    </div>
                </div>
            </form>
        </div>    
    </div>
</div>

    <br />
    <br />
    <br />

</div>
<div class="row">
    <div class="col-md-12">
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
                <td>{$nhom.tennhom}</td>
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