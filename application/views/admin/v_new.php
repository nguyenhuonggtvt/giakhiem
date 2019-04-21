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
             <form method="POST" enctype="multipart/form-data">
               <h2>Bài viết mới</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <input type="hidden" name="data[id]" value="{$khoiphuc.id}" />
                    <label>Tiêu đề</label>
                    <input type="text" class="form-control" name="data[tieude]" value="{$khoiphuc.tieude}" required=""/><br />
                    <label>Nhóm tin</label>
                    <select class="form-control" name="data[ma_nhomtin]" required="">
                        <option value="">Chọn nhóm tin</option>
                        {foreach $nhomtins as $nhomtin}
                            <option {if $khoiphuc.ma_nhomtin==$nhomtin.id} selected="" {/if} value="{$nhomtin.id}">{$nhomtin.ten_nhomtin}</option>
                        {/foreach}
                    </select><br />
                    <label>Ảnh đại diện</label>
                    <input type="file"  class="form-control" value=" {$khoiphuc.anhdaidien}" name="anhdaidien"/>
                    {if $khoiphuc.anhdaidien != ''}
                    <div style="width: 200px; margin-top:10px;"><img style="max-width: 100%;" src="{$url}webroot/imgnew/{$khoiphuc.anhdaidien}"></div>
                    {/if}
                    <br />
                    <label>Mô tả ngắn</label>
                    <input class="form-control" type="text"  name="data[mota]" value="{$khoiphuc.mota}"/>
                    <label class="">Nội dung</label>
                    <textarea id="content_intro" name="data[noidung]">
                     {$khoiphuc.noidung}
                    </textarea><br />
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
