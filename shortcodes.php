/**
     * List Post Grid
     * Shortcode: [list-post-grid per_page=""]
     */
    public function list_post_grid_func( $atts, $content=null ) {
        $options = extract(shortcode_atts(array(
            'per_page'            => 2,
            'left_right'          => 1,
            'read_more_btn_txt'   => "Read More",
            'excerpt_size'        => 100,
            'show_hide_excerpt'   => 'yes',
            'show_hide_author'    => 'yes',
            'show_hide_terms'     => 'yes',
            'show_time'           => 'yes',
            'show_date'           => 'yes',
            'excerpt_option'      => 1,
            
        ), $atts));

        $args = array(
            'post_type'                    => 'post',
            'posts_per_page'               => $per_page,
        );
        
        $query = new WP_Query($args);
        ?>
        
        <?php foreach( $query->posts as $post ) : ?>
    
            <!-- Making an excerpt of the blog post content -->
                <?php
                $excerpt = strip_tags($post->post_content);
                if (strlen($excerpt) > 10) {
                    $excerpt = substr($excerpt, 0, $excerpt_size);
                    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                    $excerpt .= '...';
                    }?>
            <!-- End Making an excerpt of the blog post content   -->
            <div class="row">
                <?php
                if($left_right == 1){
                ?>
                    <div class="col-4">
                        <img class="" src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>" alt="<?php echo $post->post_title; ?>" style="width:100%">
                    </div>

                    <div class="col-8">
                        <h4 class=""><a href="<?php echo get_the_permalink($post->ID);?>"><h4><?php echo $post->post_title; ?></h4></a></h4>
                        
                        <?php if($show_hide_author != 'yes'){ ?>
                        author: <?php echo get_the_author(); ?>
                        <?php } ?>

                        <?php if($show_hide_terms != 'yes'){ ?>
                        <?php the_terms( $post->ID, 'category', 'categories: ', ' / ' ); ?>
                        <?php } ?>

                        <?php if($show_date != 'yes'){ ?>
                        date: <?php echo get_the_date('Y-m-d');?>
                        <?php } ?>

                        <?php if($show_time != 'yes'){ ?>
                        time: <?php echo the_time('H:i:s');?>
                        <?php } ?>

                        <?php if($show_hide_excerpt != 'yes'){ ?>
                        <div class="margin_excerpt">

                        <?php if($excerpt_option == 1){ ?>
                        <?php echo $excerpt ?>
                        <?php } ?>

                        <?php if($excerpt_option != 1){ ?>
                        <?php echo get_the_excerpt($post->ID); ?>
                        <?php } ?>

                        </div>
                        <?php } ?>


                        

                        <a href="<?php echo get_the_permalink($post->ID) ?>" class=""><?php echo $read_more_btn_txt ?></a>
                        <!-- <a href="<?php echo get_the_permalink($post->ID) ?>" class="">Read article</a> -->
                    </div>
                <?php
                }
                else{
                ?>
                    <div class="col-8">
                        <h4 class=""><a href="<?php echo get_the_permalink($post->ID);?>"><h4><?php echo $post->post_title; ?></h4></a></h4>
                        
                        <?php if($show_hide_author != 'yes'){ ?>
                        author: <?php echo get_the_author(); ?>
                        <?php } ?>

                        <?php if($show_hide_terms != 'yes'){ ?>
                        <?php the_terms( $post->ID, 'category', 'categories: ', ' / ' ); ?>
                        <?php } ?>

                        <?php if($show_date != 'yes'){ ?>
                        date: <?php echo get_the_date('Y-m-d');?>
                        <?php } ?>

                        <?php if($show_time != 'yes'){ ?>
                        time: <?php echo the_time('H:i:s');?>
                        <?php } ?>

                        <?php if($show_hide_excerpt != 'yes'){ ?>
                        <div class="margin_excerpt">

                        <?php if($excerpt_option == 1){ ?>
                        <?php echo $excerpt ?>
                        <?php } ?>

                        <?php if($excerpt_option != 1){ ?>
                        <?php echo get_the_excerpt($post->ID); ?>
                        <?php } ?>

                        </div>
                        <?php } ?>
                        

                        <a href="<?php echo get_the_permalink($post->ID) ?>" class=""><?php echo $read_more_btn_txt ?></a>
                        <!-- <a href="<?php echo get_the_permalink($post->ID) ?>" class="">Read article</a> -->
                    </div>

                    <div class="col-4">
                        <img class="" src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>" alt="<?php echo $post->post_title; ?>" style="width:100%">
                    </div>
                <?php  
                }
                ?>
                </div>
        <?php endforeach;
    }
