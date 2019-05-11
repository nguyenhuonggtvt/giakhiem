<script type="text/javascript" src="{$url}webroot/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{$url}webroot/ckeditor/core.js"></script>
<!-- page content
<input type="hidden" value="{$message}" id="notify" /> -->
{if $status==1}{literal}
    <script>
        $(document).ready(function(){
            NotifySuccess('');
        });
    </script>
{/literal}{/if}
{if $status==0}{literal}
    <script>
    $(document).ready(function(){
        NotifyFalse('');
    });
     </script>
{/literal}{/if}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
               <h2>Cấu hình trang chủ</h2>
               <div class="clearfix"></div>
            </div>
            <form method="POST">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label"><h4><b>Tên danh mục</b></h4></label><br />
                    <input class="form-control" name="data[tieude]" required="" 
                        value="{if isset($arySetting.tieude)}{$arySetting.tieude}{/if}"/><br />
                    <label class="control-label"><h4><b>Mô tả</b></h4></label><br />
                    <input class="form-control" name="data[mota]" required="" 
                        value="{if isset($arySetting.mota)}{$arySetting.mota}{/if}"/><br />
                    <label class="control-label"><h4><b>Link ảnh </b></h4></label><br />
                    <input class="form-control" name="data[hinhanh]" 
                        value="{if isset($arySetting.hinhanh)}{$arySetting.hinhanh}{/if}"/><br />
                    <input type="submit" name="save" value="Lưu lại" class="btn btn-success"/>
                </div>
             </div>
            </form>
        </div>
    </div>
</div>
