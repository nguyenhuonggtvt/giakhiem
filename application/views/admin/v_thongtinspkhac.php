<script>
    $(document).ready(function(){
        {if $status == 1}
            NotifySuccess('{$message}');
        {/if}
        {if $status == 0}
            NotifyFalse('{$message}');
        {/if}
    });
</script>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
               <h2>Cấu hình trang chủ</h2>
               <div class="clearfix"></div>
            </div>
            <form method="POST" enctype="multipart/form-data">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label"><h4><b>Tên danh mục</b></h4></label><br />
                    <input class="form-control" name="data[tieude]" required="" 
                        value="{if isset($arySetting.tieude)}{$arySetting.tieude}{/if}"/>
                </div>
                <div class="form-group">
                    <label class="control-label"><h4><b>Mô tả</b></h4></label><br />
                    <input class="form-control" name="data[mota]" required="" 
                        value="{if isset($arySetting.mota)}{$arySetting.mota}{/if}"/>
                </div>
                <div class="form-group">
                    <label class="control-label"><h4><b>Hình ảnh</b></h4></label><br />
                    <input type="file"  class="form-control" value="{$arySetting.hinhanh}" name="hinhanh"/>
                    {if $arySetting.hinhanh != ''}
                    <div style="width: 200px; margin:10px 0;"><img style="max-width: 100%;" src="{$url}webroot/imgmenu/{$arySetting.hinhanh}"></div>
                    {/if}
                    <input type="hidden" name="data[hinhanh]" value="{if isset($arySetting.hinhanh)}{$arySetting.hinhanh}{/if}"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="save" value="Lưu lại" class="btn btn-success"/>
                </div>
             </div>
            </form>
        </div>
    </div>
</div>
