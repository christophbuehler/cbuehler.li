<form role="search" method="get" id="searchForm" class="searchForm" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<input placeholder="search" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
	</div>
</form>