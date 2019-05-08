<script type="text/javascript" src="{$url}webroot/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{$url}webroot/ckeditor/core.js"></script>

{if $status == 1}{literal}
    <script>
        $(document).ready(function() {
            NotifySuccess('');
        });
    </script>
{/literal}{/if}

{if $status == 0}
{literal}
    <script>
        $(document).ready(function() {
            NotifyFalse('');
        });
     </script>
{/literal}
{/if}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
             <form method="POST" enctype="multipart/form-data">
               <h2>Sản phẩm</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <input type="hidden" name="data[id]" value="{$khoiphuc.id}" />
                    <label>Tiêu đề</label>
                    <input type="text" class="form-control" name="data[ten_sp]" value="{$khoiphuc.ten_sp}" required=""/>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="text" class="form-control" name="data[price]" value="{$khoiphuc.price}" required=""/>
                </div>
                <div class="form-check" style="margin: 5px 0">
                    <label class="form-check-label" for="showprice" style="display:inline-block; margin-right:5px;">Hiển thị giá</label>
                    <input type="checkbox" class="form-check-input" name="data[showprice]" value="1" id="showprice"
                    {if $khoiphuc.showprice == 1}checked="checked"{/if} style="margin: 0; height: 14px;">
                        
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file"  class="form-control" value="{$khoiphuc.hinhanh}" name="hinhanh"/>
                    {if $khoiphuc.hinhanh != ''}
                    <div style="width: 200px; margin:10px 0;"><img style="max-width: 100%;" src="{$url}webroot/imgsp/{$khoiphuc.hinhanh}"></div>
                    {/if}
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input class="form-control" id="motangan" name="data[motangan]" value="{$khoiphuc.motangan}"/>
                </div>
                <div class="form-group">
                    <label class="">Nội dung</label>
                    <textarea id="content_intro" name="data[motachitiet]">
                     {$khoiphuc.motachitiet}
                    </textarea><br/>
                    <input type="submit" value="{$btn_val}" name="save" class="btn btn-round btn-success pull-left"/> 
                </div>
            </div>
            </form> 
        </div>
    </div>
    <br />
    <br />
    <br />
</div>
