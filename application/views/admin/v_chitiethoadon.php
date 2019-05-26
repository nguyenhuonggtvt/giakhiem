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
               <h2>Chi tiết hóa đơn</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p>Thông tin khách hàng</p>
                <div>
                    <div>Họ tên: {$aryData.name}</div>
                    <div>Điện thoại: {$aryData.phone}</div>
                    {if $aryData.email != ''}
                    <div>Email: {$aryData.email}</div>
                    {/if}
                    {if $aryData.address != ''}
                    <div>Địa chỉ: {$aryData.address}</div>
                    {/if}
                </div>
                <p>Thông tin sản phẩm</p>
                <div>
                    {foreach $aryData['productinfo'] as $key => $value}
                    <div>
                        <div>{$value.ten_sp}</div>
                        <div>{number_format($value.price)}</div>
                        <div>{$value.quantity}</div>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>

    <br />
    <br />
    <br />

</div>
