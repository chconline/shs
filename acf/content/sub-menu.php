<?php 

$menuObject = get_sub_field('menu');
$menuID     = $menuObject->term_id;
$menuName   = $menuObject->name . 'Menu';
$menuSlug   = $menuObject->slug;

$menuClasses = 'clearfix';

?>

<div class="dropdown-container center" id="<?= $menuSlug; ?>">
    <span data-id="<?= $menuSlug; ?>"><i class="fa fa-bars"></i> Menu</span>
</div>

<?php $menu = array(
    'menu' => $menuID,
    'container_id' => $menuSlug,
    'container_class' => 'menu-container',
    'menu_class'     => $menuClasses,
    'container_aria_label' => $menuName
); wp_nav_menu($menu); ?>

<div id="<?= $menuSlug; ?>-mobile">
    <?php $menu = array(
        'menu' => $menuID,
        'container_id' => $menuSlug,
        'container_class' => 'menu-container mobile-menu',
        'menu_class'     => $menuClasses,
        'container_aria_label' => $menuName
    ); wp_nav_menu($menu); ?>
</div>