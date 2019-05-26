<style>
.img-news-admin{
    max-width: 50px;
    
}
label.status-new{
    margin: 0;
    padding: 10px 10px;
    min-width: 70px;
    text-align: center;
    font-size: 90%;
    font-weight: normal;
    display: inline-block;
}
label.status-order-0 {
    background: #449d44;
}
label.status-order-1 {
    background: #f0ad4e;
}
label.status-order-2 {
    background: #31b0d5;
}
label.status-order-7 {
    background: #d9534f;
}
#ZeroClipboard_TableToolsMovie_1{
    display: none;
}
</style>
<script>
    $(document).ready(function(){
       $('div.DTTT_container').hide(); 
    });
</script>
{if $status==1}{literal}
    <script>
        $(document).ready(function(){
            NotifySuccess('Xóa thành công!');
        });
    </script>
{/literal}{/if}
{if $status==0}{literal}
    <script>
    $(document).ready(function(){
        NotifyFalse('Có lỗi, xin hãy thử lại!');
    });
     </script>
{/literal}{/if}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Quản lý hóa đơn</h2>
               
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                            <th style="text-align: center; width: 50px;">STT</th>
                            <th style="width: 120px;">Mã HD</th>
                            <th style="width: 180px;">Khách hàng</th>
                            <th style="width: 120px;">SĐT</th>
                            <th style="width: 150px;">Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th style="width: 120px;">Trạng thái</th>
                            <th style="width: 120px;">Tác vụ</th>
                        </tr>
                    </thead>

                    <tbody>
                    {foreach $aryData as $key => $value}
                        <tr class="even pointer">
                            <td class="a-center" style="text-align: center;">{$key+1}</td>
                            <td class=" ">{$value.mahoadon}</td>
                            <td class=" ">{$value.name}</td>
                            <td class=" ">{$value.phone}</td>
                            <td class=" ">{date('d/m/Y H:s', strtotime($value.ngaymua))}</td>
                            <td class=" ">{number_format($value.phone)}</td>
                            <td style="text-align: center;"><label class="label status-new status-order-{$value.trangthai}">{$aryStatus[($value.trangthai)]}</label></td>
                            <td class="a-right a-right ">
                            <a class="btn btn-default btn-sm" title="Xem chi tiết" href="{$url}admin/view/{$value.id}"><span class="fa fa-file-text-o"></span></a>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>