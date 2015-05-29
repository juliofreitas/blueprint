<?php
/** 
 * @package WordPress
 * @subpackage fat-uerj
 * @since FAT-UERJ 1.0
 */
    $related = new WP_Query(array('category_name' => 'instalacoes', 'orderby' => 'ID', 'order' => 'ASC'));
?>
                <aside class="col-md-3">
                    <ul class="list-group">
                        <?php while($related->have_posts()):$related->the_post(); ?>
                        <a href="<?php the_permalink() ?>" class="list-group-item<?php echo (get_permalink()=='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])?" active":""; ?>"><?php the_title() ?></a>
                        <?php endwhile; ?>
                    </ul>
                </aside>