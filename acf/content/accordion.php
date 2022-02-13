<?php 

$accordionOptions = []; 

$style = get_string_between(strip_tags(get_sub_field('style')), '[', ']');
$accordionOptions['style'] = $style;

?>

<?php if ( have_rows( 'accordions' ) ) : ?>
    <div class="accordion-wrapper <?php echo $accordionOptions['style']; ?>">
        <?php while ( have_rows( 'accordions' ) ) : the_row(); ?>
            <div class="accordion-container">
                <div class="label-container">
                    <div class="label">
                        <h3>
                            <?php the_sub_field( 'label' ); ?>
                            <?php if (get_sub_field('sub-heading')): ?>
                                <span><?php the_sub_field('sub-heading'); ?></span>
                            <?php endif; ?>
                        </h3>
                    </div>
                    <div class="dropdown">
                        <span>+</span>
                    </div>
                </div>

                <div class="text-wrapper clearfix">
                    <?php the_sub_field( 'content' ); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>