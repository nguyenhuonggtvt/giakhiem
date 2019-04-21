
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách gửi thông tin liên hệ</h2>
               
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                            <th>STT</th>
                            <th>Họ tên  </th>
                            <th>Email </th>
                            <th>Điện thoại </th>
                            <th>Nội dung</th>
                            <th>Thời gian gửi </th>
                           
                        </tr>
                    </thead>

                    <tbody>
                    {$stt=1}
                    {foreach $lienhes as  $value}
                        <tr class="even pointer">
                            <td>{$stt}</td>
                            <td class=" ">{$value.hoten}</td>
                            <td class=" ">{$value.email}</td>
                            <td class=" ">{$value.dienthoai}</td>
                            <td class=" ">{$value.noidung}</td>
                            <td class=" ">{$value.created|date_format:"%d/%m/%Y"}</td>
                        </tr>
                        {$stt=$stt+1}
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

</div>