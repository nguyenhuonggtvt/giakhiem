
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
         <form method="POST">
           <h2>Cấu hình trang chủ</h2>
           <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <label class="control-label"><h4><b>Doang nghiep</b></h4></label><br />
                <input class="form-control" name="data[doanhnghiep]" required="" value="{if isset($setting.doanhnghiep)}{$setting.doanhnghiep}{/if}"/><br />
                <label class="control-label"><h4><b>Địa chỉ</b></h4></label><br />
                <input class="form-control" name="data[diachi]" required="" value="{if isset($setting.diachi)}{$setting.diachi}{/if}"/><br />
                <label class="control-label"><h4><b>Hotline </b></h4></label><br />
                <input class="form-control" name="data[hotline]" required="" value="{if isset($setting.hotline)}{$setting.hotline}{/if}"/><br />
                <label class="control-label"><h4><b>Tel/Fax</b></h4></label><br />
                <input class="form-control" name="data[telfax]" required="" value="{if isset($setting.telfax)}{$setting.telfax}{/if}"/><br />
                <label class="control-label"><h4><b>Website</b></h4></label><br />
                <input class="form-control" name="data[website]" required="" value="{if isset($setting.website)}{$setting.website}{/if}"/><br />
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
