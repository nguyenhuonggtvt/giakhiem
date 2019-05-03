<h1 class="tieude-web">{$title}</h1>
<div class="box-list-video">
{foreach $aryVideo as $video}
	<div class="item-video">
		<div class="item-video-content">
			<div class="video-container" style="margin: 1em 0;">
				<iframe width="560" height="315"
						src="https://www.youtube.com/embed/{$video.code}" frameborder="0" 
						allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen></iframe>
			</div>
			{if $video.title}
			<h2 class="list-video-name">{$video.title}</h2>
			{/if}
		</div>
	</div>
{/foreach}
</div>
				