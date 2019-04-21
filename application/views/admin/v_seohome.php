
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
                <label class="control-label"><h4><b>Tiêu đề</b></h4></label><br />
                <input class="form-control" name="data[tieude]" required="" value="{if isset($setting.tieude)}{$setting.tieude}{/if}"/><br />
                <label class="control-label"><h4><b>Mô tả</b></h4></label><br />
                <input class="form-control" name="data[mota]" required="" value="{if isset($setting.mota)}{$setting.mota}{/if}"/><br />
                <label class="control-label"><h4><b>Link ảnh </b></h4></label><br />
                <input class="form-control" name="data[hinhanh]" required="" value="{if isset($setting.hinhanh)}{$setting.hinhanh}{/if}"/><br />
                <label class="control-label"><h4><b>Tên trang</b></h4></label><br />
                <input class="form-control" name="data[tentrang]" required="" value="{if isset($setting.tentrang)}{$setting.tentrang}{/if}"/><br />
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
