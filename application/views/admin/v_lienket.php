
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
         <form method="POST">
           <h2>Link liên kết mạng xã hội</h2>
           <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <label class="control-label"><h4><b>Liên kết facebook</b></h4></label><br />
                <input class="form-control" name="data[link_facebook]" value="{if isset($links.link_facebook)}{$links.link_facebook}{/if}"/><br />
                <label class="control-label"><h4><b>Liên kết Twetter</b></h4></label><br />
                <input class="form-control" name="data[link_tweeter]" value="{if isset($links.link_tweeter)}{$links.link_tweeter}{/if}"/><br />
                <label class="control-label"><h4><b>Liên kết Google +</b></h4></label><br />
                <input class="form-control" name="data[link_google]" value="{if isset($links.link_google)}{$links.link_google}{/if}"/><br />
                <label class="control-label"><h4><b>Liên kết Youtube</b></h4></label><br />
                <input class="form-control" name="data[link_youtube]" value="{if isset($links.link_youtube)}{$links.link_youtube}{/if}"/><br />
                <input type="submit" name="save" value="Lưu lại" class="btn btn-success"/>
            </div>
         </div>    
        </form> 
    </div>
</div>

<br />
<br />
<br />

</div>
