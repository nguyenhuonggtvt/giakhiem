
<h1 class="tieude-web">{$title}</h1>
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