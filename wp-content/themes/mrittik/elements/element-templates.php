<?php
    if(!function_exists('mrittik_get_post_grid')){
    function mrittik_get_post_grid($posts = [], $settings = []){
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                mrittik_get_post_grid_layout1($posts, $settings);
                break;
            case 'post-2':
                mrittik_get_post_grid_layout2($posts, $settings);
                break;

            case 'portfolio-1':
                mrittik_get_portfolio_grid_layout1($posts, $settings);
                break;
            case 'portfolio-2':
                mrittik_get_portfolio_grid_layout2($posts, $settings);
                break;
            case 'portfolio-3':
                mrittik_get_portfolio_grid_layout3($posts, $settings);
                break;

            case 'service-1':
                mrittik_get_service_grid_layout1($posts, $settings);
                break;
            case 'service-2':
                mrittik_get_service_grid_layout2($posts, $settings);
                break;

            default:
                return false;
                break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function mrittik_get_post_grid_layout1($posts = [], $settings = []){
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '1170x1543';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class_id($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <div class="item--content">
                        <span class="item--overlay"></span>
                        <?php
                        if ($key < 10) {
                            $formattedNumber = esc_attr(sprintf('%02d', $key + 1));
                        } else {
                            $formattedNumber = esc_attr($key + 1);
                        }
                        ?>
                        <h1 class="item--count show"><?php echo esc_html($formattedNumber); ?></h1>
                        <h1 class="item--count hide"><?php echo esc_html($formattedNumber); ?></h1>

                        <?php if($show_date == 'true' || $show_category == 'true') : ?>
                            <ul class="item--meta pxl-transtion">
                                <?php if($show_date == 'true'): ?>
                                    <li class="item--date"><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></li>
                                <?php endif; ?>
                                <?php if($show_category == 'true'): ?>
                                    <li class="item--category"><?php the_terms( $post->ID, 'category', '', ' , ' ); ?></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                        <h5 class="item--title"><a class="pxl-transtion" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                        <?php if ($show_excerpt == 'true' && !empty($post->post_excerpt)) : ?>
                            <div class="item--excerpt pxl-transtion <?php if(!empty($text_line)) { echo esc_attr__( 'pxl-text-line', 'mrittik' ); } ?>" <?php if(!empty($text_line)) { ?>style="-webkit-line-clamp: <?php echo esc_attr($text_line); ?>"<?php } ?>>
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a class="item--button pxl-btn-line pxl-transtion" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span class="btn-text">
                                    <?php if(!empty($button_text)) {
                                        echo pxl_print_html($button_text);
                                    } else {
                                        echo pxl_print_html('VIEW DETAILS', 'mrittik');
                                    } ?>
                                </span>
                                <span class="btn-icon">
                                    <span class="line"></span>
                                    <span class="circle"></span>
                                    <span class="dot"></span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
function mrittik_get_post_grid_layout2($posts = [], $settings = []){
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '600x738';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class_id($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <div class="item--content">
                        <?php if($show_date == 'true' || $show_category == 'true') : ?>
                            <ul class="item--meta pxl-transtion">
                                <?php if($show_date == 'true'): ?>
                                    <li class="item--date"><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></li>
                                <?php endif; ?>
                                <?php if($show_category == 'true'): ?>
                                    <li class="item--category"><?php the_terms( $post->ID, 'category', '', ' , ' ); ?></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                        <h5 class="item--title"><a class="pxl-transtion" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                        <?php if ($show_excerpt == 'true' && !empty($post->post_excerpt)) : ?>
                            <div class="item--excerpt pxl-transtion <?php if(!empty($text_line)) { echo esc_attr__( 'pxl-text-line', 'mrittik' ); } ?>" <?php if(!empty($text_line)) { ?>style="-webkit-line-clamp: <?php echo esc_attr($text_line); ?>"<?php } ?>>
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a class="item--button pxl-btn-line pxl-transtion" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span class="btn-text">
                                    <?php if(!empty($button_text)) {
                                        echo pxl_print_html($button_text);
                                    } else {
                                        echo pxl_print_html('VIEW DETAILS', 'mrittik');
                                    } ?>
                                </span>
                                <span class="btn-icon">
                                    <span class="line"></span>
                                    <span class="circle"></span>
                                    <span class="dot"></span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
// End Post Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function mrittik_get_portfolio_grid_layout1($posts = [], $settings = []){
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class_id($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $portfolio_external_link = get_post_meta($post->ID, 'portfolio_external_link', true);
            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false); ?>
                        <div class="item--featured" style="--pg-background-image: url('<?php echo esc_url($thumbnail_url[0]); ?>');">
                            <a href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="item--content">
                        <?php if($show_tag == 'true' && has_term( '', 'portfolio-tag', $post->ID )) : ?>
                            <div class="item--tags"><?php the_terms( $post->ID, 'portfolio-tag', '', ', ' ); ?></div>
                        <?php endif; ?>
                        <h5 class="item--title"><a href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                        <?php if($show_button == 'true') : ?>
                            <div class="pxl-item--button">
                                <a class="item--button pxl-btn-line" href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                    <span class="btn-text">
                                        <?php if(!empty($button_text)) {
                                            echo pxl_print_html($button_text);
                                        } else {
                                            echo pxl_print_html('VIEW DETAILS', 'mrittik');
                                        } ?>
                                    </span>
                                    <span class="btn-icon">
                                        <span class="line"></span>
                                        <span class="circle"></span>
                                        <span class="dot"></span>
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function mrittik_get_portfolio_grid_layout2($posts = [], $settings = []){
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class_id($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $portfolio_external_link = get_post_meta($post->ID, 'portfolio_external_link', true);
            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false); ?>
                        <div class="item--featured" style="--pg-background-image: url('<?php echo esc_url($thumbnail_url[0]); ?>');">
                            <a href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="item--content">
                        <h5 class="item--title"><a href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                        <?php if($show_tag == 'true' && has_term( '', 'portfolio-tag', $post->ID )) : ?>
                            <div class="item--tags"><?php the_terms( $post->ID, 'portfolio-tag', '', ', ' ); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function mrittik_get_portfolio_grid_layout3($posts = [], $settings = []){
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class_id($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $portfolio_external_link = get_post_meta($post->ID, 'portfolio_external_link', true);
            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false); ?>
                        <div class="item--featured">
                            <a href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="item--content">
                        <?php if($show_tag == 'true' && has_term( '', 'portfolio-tag', $post->ID )) : ?>
                            <div class="item--tags"><?php the_terms( $post->ID, 'portfolio-tag', '', ', ' ); ?></div>
                        <?php endif; ?>
                        <h4 class="item--title"><a href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h4>
                        <?php if($show_button == 'true') : ?>
                            <a class="item--button pxl-btn-line" href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <span class="btn-text">
                                    <?php if(!empty($button_text)) {
                                        echo pxl_print_html($button_text);
                                    } else {
                                        echo pxl_print_html('VIEW DETAILS', 'mrittik');
                                    } ?>
                                </span>
                                <span class="btn-icon">
                                    <span class="line"></span>
                                    <span class="circle"></span>
                                    <span class="dot"></span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

// End Portfolio Grid

// Start Service Grid
//--------------------------------------------------
function mrittik_get_service_grid_layout1($posts = [], $settings = []){
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class_id($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_img_light = get_post_meta($post->ID, 'service_img_light', true);
            $service_img_dark = get_post_meta($post->ID, 'service_img_dark', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <h5 class="item--count">
                        <?php if($key < 10) {
                            echo esc_attr(sprintf('%02d', $key+1));
                        } else {
                            echo esc_attr($key+1);
                        } ?>
                    </h5>
                    <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                        <div class="item--icon">
                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                        </div>
                    <?php endif; ?>
                    <?php if($service_icon_type == 'image') : ?>
                        <div class="item--icon">
                            <?php if(!empty($service_img_light['url'])) {
                                $icon_img_light = pxl_get_image_by_size(array(
                                    'attach_id'  => $service_img_light['id'],
                                    'thumb_size' => 'full',
                                    'class' => 'logo-light',
                                ));
                                $icon_thumbnail_light = $icon_img_light['thumbnail'];
                                echo wp_kses_post($icon_thumbnail_light);
                            } ?>
                            <?php if(!empty($service_img_dark['url'])) {
                                $icon_img_dark = pxl_get_image_by_size(array(
                                    'attach_id'  => $service_img_dark['id'],
                                    'thumb_size' => 'full',
                                    'class' => 'logo-dark',
                                ));
                                $icon_thumbnail_dark = $icon_img_dark['thumbnail'];
                                echo wp_kses_post($icon_thumbnail_dark);
                            } ?>
                        </div>
                    <?php endif; ?>
                    <div class="item--content">
                        <h4 class="item--title">
                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </a>
                        </h4>
                        <?php if ($show_excerpt == 'true' && !empty($post->post_excerpt)) : ?>
                            <div class="item--excerpt pxl-transtion <?php if(!empty($text_line)) { echo esc_attr__( 'pxl-text-line', 'mrittik' ); } ?>" <?php if(!empty($text_line)) { ?>style="-webkit-line-clamp: <?php echo esc_attr($text_line); ?>"<?php } ?>>
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a class="item--button pxl-btn-crossline pxl-transtion" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <span class="crossline1"></span>
                                <span class="crossline2"></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function mrittik_get_service_grid_layout2($posts = [], $settings = []){
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = $grid_masonry[$key]['col_lg_m'];
                $col_md_m = $grid_masonry[$key]['col_md_m'];
                $col_sm_m = $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class_id($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }

            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_img_light = get_post_meta($post->ID, 'service_img_light', true);
            $service_img_dark = get_post_meta($post->ID, 'service_img_dark', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false); ?>
                        <div class="item--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <span class="item--overlay"></span>
                    <div class="item--content">
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="item--icon">
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image') : ?>
                            <div class="item--icon">
                                <?php if(!empty($service_img_light['url'])) {
                                    $icon_img_light = pxl_get_image_by_size(array(
                                        'attach_id'  => $service_img_light['id'],
                                        'thumb_size' => 'full',
                                        'class' => 'logo-light',
                                    ));
                                    $icon_thumbnail_light = $icon_img_light['thumbnail'];
                                    echo wp_kses_post($icon_thumbnail_light);
                                } ?>
                                <?php if(!empty($service_img_dark['url'])) {
                                    $icon_img_dark = pxl_get_image_by_size(array(
                                        'attach_id'  => $service_img_dark['id'],
                                        'thumb_size' => 'full',
                                        'class' => 'logo-dark',
                                    ));
                                    $icon_thumbnail_dark = $icon_img_dark['thumbnail'];
                                    echo wp_kses_post($icon_thumbnail_dark);
                                } ?>
                            </div>
                        <?php endif; ?>
                        <h4 class="item--title">
                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </a>
                        </h4>
                        <?php if ($show_excerpt == 'true' && !empty($post->post_excerpt)) : ?>
                            <div class="item--excerpt pxl-transtion <?php if(!empty($text_line)) { echo esc_attr__( 'pxl-text-line', 'mrittik' ); } ?>" <?php if(!empty($text_line)) { ?>style="-webkit-line-clamp: <?php echo esc_attr($text_line); ?>"<?php } ?>>
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a class="item--button pxl-btn-crossline pxl-transtion" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <span class="crossline1"></span>
                                <span class="crossline2"></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
// End Service Grid
//--------------------------------------------------

add_action( 'wp_ajax_mrittik_get_pagination_html', 'mrittik_get_pagination_html' );
add_action( 'wp_ajax_nopriv_mrittik_get_pagination_html', 'mrittik_get_pagination_html' );
function mrittik_get_pagination_html(){
    try{
        if(!isset($_POST['query_vars'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'mrittik'));
        }
        $query = new WP_Query($_POST['query_vars']);
        ob_start();
        mrittik()->page->get_pagination( $query,  true );
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'mrittik'),
                'data' => array(
                    'html' => $html,
                    'query_vars' => $_POST['query_vars'],
                    'post' => $query->have_posts()
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_mrittik_load_more_product_grid', 'mrittik_load_more_product_grid' );
add_action( 'wp_ajax_nopriv_mrittik_load_more_product_grid', 'mrittik_load_more_product_grid' );
function mrittik_load_more_product_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'mrittik'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        $query_type         = isset($settings['query_type']) ? $settings['query_type'] : 'recent_product';
        $post_per_page      = isset($settings['limit']) ? $settings['limit'] : 8;
        $product_ids        = isset($settings['product_ids']) ? $settings['product_ids'] : '';
        $categories         = isset($settings['categories']) ? $settings['categories'] : '';
        $param_args         = isset($settings['param_args']) ? $settings['param_args'] : [];

        $col_xxl = isset($settings['col_xxl']) ? 'col-xxl-'.str_replace('.', '',12 / floatval($settings['col_xxl'])) : '';
        $col_xl = isset($settings['col_xl']) ? 'col-xl-'.str_replace('.', '',12 / floatval( $settings['col_xl'])) : '';
        $col_lg = isset($settings['col_lg']) ? 'col-lg-'.str_replace('.', '',12 / floatval( $settings['col_lg'])) : '';
        $col_md = isset($settings['col_md']) ? 'col-md-'.str_replace('.', '',12 / floatval( $settings['col_md'])) : '';
        $col_sm = isset($settings['col_sm']) ? 'col-sm-'.str_replace('.', '',12 / floatval( $settings['col_sm'])) : '';
        $col_xs = isset($settings['col_xs']) ? 'col-'.str_replace('.', '',12 / floatval( $settings['col_xs'])) : '';

        $item_class = trim(implode(' ', ['pxl-grid-item', $col_xxl, $col_xl, $col_lg, $col_md, $col_sm, $col_xs]));

        $loop = mrittik_woocommerce_query($query_type,$post_per_page,$product_ids,$categories,$param_args);
        extract($loop);

        if($posts->have_posts()){
            ob_start();
                $d = 0;
                while ($posts->have_posts()) {
                    $posts->the_post();
                    global $product;
                    $d++;
                    $unit_price = get_post_meta($product->get_id(), 'unit_price');
                    $term_list = array();
                    $term_of_post = wp_get_post_terms($product->get_ID(), 'product_cat');
                    foreach ($term_of_post as $term) {
                        $term_list[] = $term->slug;
                    }
                    $filter_class = implode(' ', $term_list);

                    $filter_attribute = '';
                    $attributes = wc_get_product($product->get_id())->get_attributes();
                    $attribute_slugs = array();
                    foreach ($attributes as $attribute) {
                        $attribute_name = $attribute->get_name();
                        $attribute_terms = $attribute->get_terms();

                        foreach ($attribute_terms as $term) {
                            $attribute_slugs[] = $term->slug;
                        }
                    }
                    $filter_attribute = implode(' ', $attribute_slugs);

                    $tag_list = array();
                    $tag_of_post = wp_get_post_terms($product->get_ID(), 'product_tag');
                    foreach ($tag_of_post as $term4) {
                        $tag_list[] = $term4->slug;
                    }
                    $filter_tag = implode(' ', $tag_list);

                    ?>
                    <div class="<?php echo trim(implode(' ', [$item_class, $filter_class, $filter_attribute, $filter_tag])); ?>" data-price="<?php echo wp_kses_post($product->get_regular_price()); ?>">
                        <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                            <a href="<?php echo esc_url(get_permalink( $product->get_ID() )); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                <?php $badge_new = get_post_meta($product->get_id(), 'badge_new', '1'); ?>
                                <?php if ($product->is_on_sale()):?>
                                    <span class="onsale"><?php echo pxl_print_html('Sale', 'mrittik'); ?></span>
                                <?php endif; ?>
                                <?php if($badge_new == '1') :?>
                                    <span class="isnew"><?php echo pxl_print_html('New', 'mrittik'); ?></span>
                                <?php endif; ?>
                                <?php if ($product->is_featured()):?>
                                    <span class="featured"><?php echo pxl_print_html('Hot', 'mrittik'); ?></span>
                                <?php endif; ?>
                            </a>
                            <div class="woocommerce-product-inner">
                                <?php
                                $image_size = !empty($img_size) ? $img_size : '810x969';
                                $img_id     = get_post_thumbnail_id( $product->get_ID() );
                                if (has_post_thumbnail($product->get_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($product->get_ID()), false)):
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $image_size
                                    ) );
                                $thumbnail = $img['thumbnail'];
                                ?>
                                <div class="woocommerce-product-header">
                                    <a class="woocommerce-product-details" href="<?php echo esc_url(get_permalink( $product->get_ID() )); ?>">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </a>
                                    <div class="woocommerce-product-meta">
                                        <?php if (class_exists('WPCleverWoosq')) { ?>
                                            <div class="woocommerce-btn-item woocommerce-quick-view">
                                                <?php echo do_shortcode('[woosq id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                            </div>
                                        <?php } ?>
                                        <?php if (class_exists('WPCleverWoosc')) { ?>
                                            <div class="woocommerce-btn-item woocommerce-compare">
                                                <?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                            </div>
                                        <?php } ?>
                                        <?php if (class_exists('WPCleverWoosw')) { ?>
                                            <div class="woocommerce-btn-item woocommerce-wishlist">
                                                <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="woocommerce-btn-item woocommerce-add-to--cart">
                                            <?php
                                            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button ajax_add_to_cart %s product_type_%s"></a>',
                                                    esc_url( $product->add_to_cart_url() ),
                                                    esc_attr( $product->get_id() ),
                                                    esc_attr( $product->get_sku() ),
                                                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                                                    esc_attr( $product->get_type() ),
                                                ),
                                                $product );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="woocommerce-product-content">
                                    <h6 class="woocommerce-product--title">
                                        <a href="<?php echo esc_url(get_permalink( $product->get_ID() )); ?>"><?php echo esc_attr(get_the_title($product->get_ID())); ?></a>
                                    </h6>
                                    <?php if(!empty($unit_price)) : ?>
                                        <div class="unit-price"><?php print implode(", ", $unit_price); ?></div>
                                    <?php endif; ?>
                                    <div class="woocommerce-product--price">
                                        <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                                    </div>
                                    <div class="woocommerce-product--excerpt" style="display: none;">
                                        <?php woocommerce_template_single_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                if($settings['layout_mode'] == 'masonry')
                    echo '<div class="grid-sizer '.$item_class.'"></div>';
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => esc_html__('Load Post Grid Successfully!', 'mrittik'),
                    'data' => array(
                        'html'  => $html,
                        'paged' => $settings['paged'],
                        'posts' => $posts,
                        'max' => $max,
                    ),
                )
            );
        }else{
            wp_send_json(
                array(
                    'status' => false,
                    'message' => esc_html__('Load Post Grid No More!', 'mrittik')
                )
            );
        }
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_mrittik_load_more_post_grid', 'mrittik_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_mrittik_load_more_post_grid', 'mrittik_load_more_post_grid' );
function mrittik_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'mrittik'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source' => isset($settings['source'])?$settings['source']:'',
            'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
            'order' => isset($settings['order'])?$settings['order']:'desc',
            'limit' => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids' => isset($settings['post_ids'])?$settings['post_ids']:[],
        ]));
        ob_start();

        mrittik_get_post_grid($posts, $settings);
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'mrittik'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

if(!function_exists('pxl_get_term_of_post_to_class_id')){
    function pxl_get_term_of_post_to_class_id($post_id, $tax = array())
    {
        $term_list = array();
        foreach ($tax as $taxo) {
            $term_of_post = wp_get_post_terms($post_id, $taxo);
            foreach ($term_of_post as $term) {
                $term_list[] = 'pxl-term-'.$term->term_id;
            }
        }

        return implode(' ', $term_list);
    }
}