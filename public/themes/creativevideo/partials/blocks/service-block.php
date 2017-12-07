<div class="grid__item grid__item--xs-12 grid__item--md-3">
    <div class="block block--centered">
        <img class="block__logo" src="<?php echo get_field( 'logo' )['url']; ?>">
        <h2 class="block__title"><?php echo get_the_title(); ?></h2>
        <span class="block__description"><?php echo get_field( 'description' ); ?>
    </div>
</div>