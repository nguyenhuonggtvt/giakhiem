{if !empty($tintucs)}
<h1 class="tieude-web">Kết quả tìm kiếm</h1>
	<div class="over">
    {foreach $tintucs as $tintuc}
		<div class="bai-viet-item">
			<div class="bai-viet-thumb">
				<a href="{$url}bai-viet/{$tintuc.slug}.html"><img src="{$url}webroot/imgnew/{$tintuc.anhdaidien}" alt="{$tintuc.slug}" title="{$tintuc.tieude}"></a>
			</div>
			<div class="bai-viet-info">
				<h2><a href="{$url}bai-viet/{$tintuc.slug}.html" title="{$tintuc.tieude}">{$tintuc.tieude}</a></h2>
				<div class="bai-viet-mo-ta">
					{if $isMobile}
						{word_limiter($tintuc.mota, 15)}
					{else}
						{word_limiter($tintuc.mota, 60)}
					{/if}
				</div>
			</div>
		</div>
    {/foreach}
	</div>
 {/if}
 {if !empty($sanphams)}
 <div style="height:2em;"></div>
{foreach $sanphams as $sanpham}
<div class="sanpham-item">
	<div class="sanpham-thumb">
		<a href="{$url}changia/{$sanpham.slug}.html">
			<img src="{$url}webroot/imgsp/{$sanpham.hinhanh_thumb}" height="350px" width="300px" alt="{$sanpham.slug}" title="{$sanpham.ten_sp}" />
		</a>
	</div>
	<div class="sanpham-info">
		<h2><a href="{$url}changia/{$sanpham.slug}.html">{$sanpham.ten_sp}</a></h2>
	</div>
</div>
{/foreach}
{/if}