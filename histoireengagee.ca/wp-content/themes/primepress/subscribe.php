<div id="pp-subscribe" class="clearfix<?php if ($pp_feed_id) echo ' pp-email-true'; ?>">
	<ul class="clearfix">
	<li id="pp-feed">
		<a href="<?php if ($pp_feed_address) {echo $pp_feed_address;} else {bloginfo('rss2_url');} ?>" title="Fil RSS"><span class="email-narrow">to our Feed</span> Fil RSS</a>
	</li>

	<?php if ($pp_feed_id) { ?>
	<li id="pp-email">
		<a target="_blank" href="http://feedburner.google.com/fb/a/mailverify?uri=Histoireengage&amp;loc=en_US" title="Abonnement par courriel à la revue" >Abonnement par courriel à la revue</a>
	</li>
	<?php } ?>
	</ul>
</div>