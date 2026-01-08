<div class="pxl-post-detail <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <?php if(!empty($settings['title'])) : ?>
        <h5 class="widget-title <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s"><?php echo esc_attr($settings['title']); ?></h5>
    <?php endif; ?>
    <div class="widget-inner">
        <?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
            <?php foreach ($settings['items'] as $key => $value):
                $content_type = isset($value['content_type']) ? $value['content_type'] : '';
                $label = isset($value['label']) ? $value['label'] : '';
                $content = isset($value['content']) ? $value['content'] : '';
                $post_type = isset($value['post_type']) ? $value['post_type'] : ''; ?>

                <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']);?>" >
                    <?php if(!empty($label)) : ?>
                        <span class="item--label"><?php echo esc_attr($label); ?></span>
                    <?php endif; ?>

                    <span class="item--content">
                        <?php
                            switch ($content_type) {
                                default:
                                echo esc_attr($content);
                                break;

                                case 'author':
                                echo the_author_posts_link();
                                break;

                                case 'date':
                                echo get_the_date();
                                break;

                                case 'category':
                                if ($post_type == 'post') {
                                    the_terms( get_the_ID(), 'category', '', ', ' );
                                } elseif ($post_type == 'service') {
                                    the_terms( get_the_ID(), 'service-category', '', ', ' );
                                } else {
                                    the_terms( get_the_ID(), 'portfolio-category', '', ', ' );
                                }
                                break;

                                case 'tag':
                                if ($post_type == 'post') {
                                    the_terms( get_the_ID(), 'post_tag', '', ', ' );
                                } elseif ($post_type == 'service') {
                                    the_terms( get_the_ID(), 'service-tag', '', ', ' );
                                } else {
                                    the_terms( get_the_ID(), 'portfolio-tag', '', ', ' );
                                }
                                break;
                            }
                        ?>
                    </span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php if($settings['social_share'] == 'yes'): ?>
        <div class="widget-social">
            <?php if(!empty($settings['social_label'])) : ?>
                <span class="item--label"><?php echo esc_attr($settings['social_label']); ?></span>
            <?php endif; ?>
            <?php if($settings['social_facebook'] == 'yes') : ?>
                <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'mrittik'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
            <?php endif; ?>
            <?php if($settings['social_twitter'] == 'yes') : ?>
                <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'mrittik'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="caseicon-twitter"></i></a>
            <?php endif; ?>
            <?php if($settings['social_pinterest'] == 'yes') : ?>
                <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'mrittik'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>"><i class="caseicon-pinterest"></i></a>
            <?php endif; ?>
            <?php if($settings['social_linkedin'] == 'yes') : ?>
                <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'mrittik'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="caseicon-linkedin"></i></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>