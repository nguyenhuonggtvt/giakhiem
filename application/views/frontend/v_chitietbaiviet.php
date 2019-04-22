{if !empty($baiviet)}
	<h1 class="tieude-web">{$baiviet.tieude}</h1>
	<div class="chitietbv-ngaydang"></div>
	<div class="chitietbv-share">
		<a href="#" class="btn-share share-facebook"></a>
		<a href="#" class="btn-share share-googleplus"></a>
		<a href="#" class="btn-share share-twitter"></a>
	</div>
	<div class="chitietbv-mota">
		{$baiviet.mota}
	</div>
	<div class="chitietbv-noidungchitiet">
		{$baiviet.noidung}
	</div><!--End nội dung chi tiết-->
    
	{if !empty($tintucs)}
        <h2 class="tieude-lienquan">Bài viết liên quan</h2>
    {/if}
	{foreach $tintucs as $tintuc}
    <h3 class="bv-lienquan"><a title="{$tintuc.tieude}" href="{$url}bai-viet/{$tintuc.slug}.html">{$tintuc.tieude}</a></h3>
	{/foreach}
 {/if}
