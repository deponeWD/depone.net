<form method="get" class="suchformular" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" name="s" class="suchfeld" placeholder="<?php esc_attr_e( '...', '' ); ?>" />
		<input type="submit" name="submit" class="suchen" value="<?php esc_attr_e( 'suchen', '' ); ?>" />
</form>