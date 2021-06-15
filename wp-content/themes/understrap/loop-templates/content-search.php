<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
?>

    <section class="restaurants">
        <div class="container">
            <h3 class="restaurants__title"><?php $post_type = get_post_type_object(get_post_type($post));
                echo $post_type->label; ?></h3>
            <div class="row">
                <div class="col-12 col-md-6">
                    <?php
                    $args = array('post_type' => 'invoices', 'posts_per_page' => 10);
                    $the_query = new WP_Query($args);
                    ?>
                    <?php
                    $curTerm = $wp_query->queried_object;
                    $terms = get_terms('all');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        echo "<ul class='restaurants__list'>";
                        foreach ($terms as $term) {
                            $classes = array();
                            if ($term->name == $curTerm->name) {
                                $classes[] = 'active';
                            }
                            echo '<li class="' . implode(' ', $classes) . '"><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
                        }
                        echo "</ul>";
                    }
                    ?>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
                    <form class='restaurants__search' role="search" action="<?php echo site_url('/'); ?>" method="get"
                          id="searchform">
                        <input type="submit" alt="Search" value=""/>
                        <input type="text" name="s" placeholder="Search" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Search'"/>
                        <input type="hidden" name="post_type" value="invoices"/>
                    </form>
                </div>
            </div>


            <table class="restaurants__table">
                <thead>
                <tr>
                    <th> <?php
                        $field_name = "ID";
                        $field = get_field_object($field_name);
                        echo $field['label'];
                        ?>
                    </th>
                    <th>
                        Restaurant
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        <?php
                        $field_name = "start_date";
                        $field = get_field_object($field_name);
                        echo $field['label'];
                        ?>
                    </th>
                    <th>
                        <?php
                        $field_name = "end_date";
                        $field = get_field_object($field_name);
                        echo $field['label'];
                        ?>
                    </th>
                    <th> <?php
                        $field_name = "total";
                        $field = get_field_object($field_name);
                        echo $field['label'];
                        ?>
                    </th>
                    <th>
                        <?php
                        $field_name = "fees";
                        $field = get_field_object($field_name);
                        echo $field['label'];
                        ?>
                    </th>
                    <th>
                        <?php
                        $field_name = "transfer";
                        $field = get_field_object($field_name);
                        echo $field['label'];
                        ?>
                    </th>
                    <th>
                        <?php
                        $field_name = "orders";
                        $field = get_field_object($field_name);
                        echo $field['label'];
                        ?>
                    </th>
                </tr>
                </thead>
                <tbody>

                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        ?>
                        <tr class="restaurants__card">
                            <td data-label="<?php
                            $field_name = "ID";
                            $field = get_field_object($field_name);
                            echo $field['label'];
                            ?>">
                                #<?php the_field('ID', $page_id); ?>
                            </td>
                            <td data-label="Restaurant">
                                <div class="restaurants__item"> <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('thumbnail');
                                    }
                                    ?>
                                    <p><?php the_title(); ?></p>
                                </div>
                            </td>
                            <td data-label="Status">
                                <?php
                                $the_post_id = get_the_ID();
                                $article_terms = wp_get_post_terms($the_post_id, ['category', 'all']);
//                                if (empty($article_terms) || !is_array($article_terms)) {
//                                    return ;
//                                }
                                ?>
                                <?php
                                foreach ($article_terms as $key => $article_term) {
                                    ?>
                                    <a class="<?php echo esc_html($article_term->name); ?>"
                                       href="<?php echo esc_url(get_term_link($article_term)); ?>">

                                        <?php echo esc_html($article_term->name); ?>

                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td data-label="<?php
                            $field_name = "start_date";
                            $field = get_field_object($field_name);
                            echo $field['label'];
                            ?>">
                                <?php the_field('start_date', $page_id); ?>
                            </td>
                            <td data-label=" <?php
                            $field_name = "end_date";
                            $field = get_field_object($field_name);
                            echo $field['label'];
                            ?>">
                                <?php the_field('end_date', $page_id); ?>
                            </td>
                            <td data-label="<?php
                            $field_name = "total";
                            $field = get_field_object($field_name);
                            echo $field['label'];
                            ?>">
                                <?php the_field('total', $page_id); ?>
                            </td>
                            <td data-label="<?php
                            $field_name = "fees";
                            $field = get_field_object($field_name);
                            echo $field['label'];
                            ?>">
                                <?php the_field('fees', $page_id); ?>
                            </td>
                            <td data-label="<?php
                            $field_name = "transfer";
                            $field = get_field_object($field_name);
                            echo $field['label'];
                            ?>">
                                <?php the_field('transfer', $page_id); ?>
                            </td>
                            <td data-label="<?php
                            $field_name = "orders";
                            $field = get_field_object($field_name);
                            echo $field['label'];
                            ?>">
                                <?php the_field('orders', $page_id); ?>

                            </td>
                        </tr>
                        <?php
                        $term_obj_list = get_the_terms($post->ID, 'home_type');
                        echo ' ' . join(' ', wp_list_pluck($term_obj_list, 'name'));
                        ?>
                        <?php
                    }
                }
                ?>




                </tbody>
            </table>
        </div>
    </section>

