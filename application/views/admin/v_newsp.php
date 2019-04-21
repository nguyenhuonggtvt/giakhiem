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

{if $status==0}
{literal}
    <script>
    $(document).ready(function(){
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
               <h2>Sản phẩm mới</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <input type="hidden" name="data[id]" value="{$khoiphuc.id}" />
                    <label>Tiêu đề</label>
                    <input type="text" class="form-control" name="data[ten_sp]" value="{$khoiphuc.ten_sp}" required=""/><br />
                    <label>Nhóm sản phẩm</label>
                    <select class="form-control" name="data[ma_nhomsp]" required="">
                        <option value="">Chọn nhóm tin</option>
                        {foreach $nhomsps as $nhomsp}
                            <option {if $khoiphuc.ma_nhomsp==$nhomsp.id} selected="" {/if} value="{$nhomsp.id}">{$nhomsp.tennhom}</option>
                        {/foreach}
                    </select><br />
                    <label>Ảnh đại diện</label>
                    <input type="file"  class="form-control" value="{$khoiphuc.hinhanh}" name="hinhanh"/><br />
                    <label>Mô tả ngắn</label>
                    <input class="form-control" id="motangan" name="data[motangan]" value="{$khoiphuc.motangan}"/>
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
