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
               <h2>Giới thiệu ngắn</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <textarea id="content_intro" name="data[gioithieungan]">
                     {$gioithieu.gioithieungan}
                    </textarea><br />
                    <input type="submit" value="Lưu lại" name="save" class="btn btn-round btn-success pull-left"/> 
                </div>
            </div>
            </form> 
        </div>
    </div>

    <br />
    <br />
    <br />

</div>
