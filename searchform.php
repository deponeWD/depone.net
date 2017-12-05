<form method="get" class="suchformular" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="visually-hidden" for="searchterm">Webseite durchsuchen:</label>
	<input id="searchterm" type="text" name="s" class="suchfeld" placeholder="<?php esc_attr_e( '...', '' ); ?>" />
	<input type="submit" name="submit" class="suchen" value="<?php esc_attr_e( 'suchen', '' ); ?>" />
</form>
