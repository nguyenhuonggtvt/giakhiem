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
{literal}
    <script>
    $(document).ready(function(){
        $('input.uutien').change(function(){
            var ask=confirm("Bạn có chắc chắn muốn thay đổi thứ tự menu không?");
            
            if(ask==true){
               $.ajax({
                    type:'POST',
                    url:gb_url+'menu',
                    data:{'action':'stt_up','id':$(this).data('id'),'stt':$(this).val()},
                    success:function(data){
                        
                        NotifySuccess("Cập nhật số thứ tự thành công!");
                    }
               }); 
           }
           
        });
    });
     </script>
{/literal}

<div><h3>Menu</h3></div>
<div class="row">
    <div class="col-md-4">
    <div class="form-group">
        <form method="POST" enctype="multipart/form-data">
            <label class="control-label">Tên menu</label>
            <input type="hidden" name="data[id]" value="{$khoiphuc.id}" />
            <input class="form-control" type="text" name="data[ten_menu]" value="{$khoiphuc.ten_menu}" required=""/><br />
            <label class="control-label">Menu cha</label>
            <select class="form-control" name="data[parent]">
                <option value="0">Không</option>
                {foreach $listmenu as $menu}
                    {if $menu.parent==0}
                    <option value="{$menu.id}">{$menu.ten_menu}</option>
                    {/if}
                {/foreach}
            </select><br />
            <label class="control-label">Ảnh đại diện</label>
            <input  class="form-control" name="img_menu" type="file"/><br />
            <label class="control-label">Nhập đường link</label>
            <input name="data[link]" class="form-control" type="text" value="{$khoiphuc.link}"/><br />
            <input type="submit" class="form-control btn btn-success col-md-3 " name="save" value="{$btn_val}"/>
            <a href="groupnew" class="form-control btn btn-warning col-md-2">Hủy</a>
            
        </form>
    </div>
    
    </div>
    <div class="col-md-7">
        <table class="table table-striped responsive-utilities jambo_table">
            <tr>
                <th class="text-center" style="width: 50px;">TT</th>
                <th class="text-center">Tên Menu</th>
                <th class="text-center">Ảnh đại diện</th>
                <th class="text-center">Cấp menu</th>
                <th class="text-center">Tác vụ</th>
            </tr>
            {$stt=1}
            {foreach $listmenu as $nhom}
            {if $nhom.parent==0}
            <tr>
                <td class="text-center"><input style="text-align: center;" size="5" data-id="{$nhom.id}" type="text" class="uutien" value="{$nhom.stt_uutien}"/></td>
                <td>{$nhom.ten_menu}</td>
                <td>{if $nhom.img_menu!=''}<img src="{$url}webroot/imgmenu/{$nhom.img_menu}" width="50px" height="40px;"/>{else}<b>Không có ảnh</b> {/if}</td>
                <td>{if $nhom.parent==0}<b>Cấp 1</b> {/if}</td>
                <td class="text-center">
                <a class="btn btn-primary btn-sm" href="?edit={$nhom.id}">
                <span class="fa fa-edit"></span>
                </a>
                <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc menu này không?')" href="?del={$nhom.id}">
                <span class="glyphicon glyphicon-trash"></span>
                </a>         
                </td>
            </tr>
            {/if}
            {foreach $listmenu as $menucon}
                {if $menucon.parent==$nhom.id}
                <tr>
                <td class="text-center"><input style="text-align: center;" size="5" data-id="{$nhom.id}" type="text" class="uutien" value="{$menucon.stt_uutien}"/></td>
                <td>{$menucon.ten_menu}</td>
                <td>{if $menucon.img_menu!=''}<img src="{$url}webroot/imgmenu/{$menucon.img_menu}" width="50px" height="40px;"/>{else}<b>Không có ảnh</b> {/if}</td>
                <td><b>Cấp 2</b></td>
                <td class="text-center">
                <a class="btn btn-primary btn-sm" href="?edit={$menucon.id}">
                <span class="fa fa-edit"></span>
                </a>
                <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc menu này không?')" href="?del={$nhom.id}">
                <span class="glyphicon glyphicon-trash"></span>
                </a>         
                </td>
            </tr>
                {/if}
            {/foreach}
            {/foreach}
        </table>
    </div>
</div>