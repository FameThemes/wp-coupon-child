<div data-id="<?php echo wpcoupon_coupon()->ID; ?>"
     class="coupon-item <?php echo wpcoupon_coupon()->has_thumb() ? 'has-thumb' : 'no-thumb'; ?> store-listing-item c-type-<?php echo esc_attr( wpcoupon_coupon()->get_type() ); ?> coupon-listing-item shadow-box">

    <div class="store-thumb-link">
        <div class="store-thumb">
            <a href="<?php echo esc_attr( wpcoupon_coupon()->get_store_url() ); ?>">
                <?php echo wpcoupon_coupon()->get_thumb('wpcoupon_medium-thumb'); ?>
            </a>
        </div>
    </div>

    <div class="latest-coupon">
        <h3 class="coupon-title">
            <?php
            edit_post_link('<i class="edit icon"></i>', '', '', wpcoupon_coupon()->ID );
            ?>
            <a rel="nofollow" title="<?php echo esc_attr( get_the_title( wpcoupon_coupon()->ID ) ) ?>"
               class="coupon-link"
               data-type="<?php echo wpcoupon_coupon()->get_type(); ?>"
               data-coupon-id="<?php echo wpcoupon_coupon()->ID; ?>"
               data-aff-url="<?php echo esc_attr( wpcoupon_coupon()->get_go_out_url() ); ?>"
               href="<?php echo esc_attr( wpcoupon_coupon()->get_href() ); ?>"><?php echo get_the_title( wpcoupon_coupon()->ID ); ?></a></h3>
        <div class="c-type">
            <span class="c-code c-<?php echo esc_attr( wpcoupon_coupon()->get_type() ); ?>"><?php echo wpcoupon_coupon()->get_coupon_type_text( ); ?></span>
            <?php if ( ! wpcoupon_coupon()->has_expired() ) { ?>
                <span class="exp"><?php printf( esc_html__( 'Expires %s', 'wp-coupon' ), wpcoupon_coupon()->get_expires() ); ?></span>
            <?php } else { ?>
                <span class="exp has-expired"><?php echo wpcoupon_coupon()->get_expires() ; ?></span>
            <?php } ?>
        </div>
        <div class="coupon-des">
            <div class="coupon-des-ellip"><?php
                echo  wpcoupon_coupon()->get_excerpt(
                    apply_filters( 'coupon_excerpt_length', 10 ),
                    '<span class="c-actions-span">...<a class="more" href="#">'.esc_html__( 'More', 'wp-coupon' ).'</a></span>' );
                ?></div>
            <?php if ( wpcoupon_coupon()->has_more_content ) { ?>
                <div class="coupon-des-full"><?php
                    echo str_replace( ']]>', ']]&gt;',  apply_filters( 'the_content', wpcoupon_coupon()->post_content.' <a class="more less" href="#">'. esc_html__( 'Less', 'wp-coupon') .'</a>' ) );
                    ?></div>
            <?php } ?>
        </div>
    </div>

    <div class="coupon-detail coupon-button-type">
        <?php
        switch ( wpcoupon_coupon()->get_type() ) {

            case 'sale':
                ?>
                <a rel="nofollow" data-type="<?php echo wpcoupon_coupon()->get_type(); ?>" data-coupon-id="<?php echo wpcoupon_coupon()->ID; ?>" data-aff-url="<?php echo esc_attr( wpcoupon_coupon()->get_go_out_url() ); ?>" class="coupon-deal coupon-button" href="<?php echo esc_attr( wpcoupon_coupon()->get_href() ); ?>"><?php esc_html_e( 'Get Deal', 'wp-coupon' ); ?> <i class="shop icon"></i></a>
                <?php
                break;
            case 'print':
                ?>
                <a rel="nofollow" data-type="<?php echo wpcoupon_coupon()->get_type(); ?>" data-coupon-id="<?php echo wpcoupon_coupon()->ID; ?>" data-aff-url="<?php echo esc_attr( wpcoupon_coupon()->get_go_out_url() ); ?>" class="coupon-print coupon-button" href="<?php echo esc_attr( wpcoupon_coupon()->get_href() ); ?>"><?php esc_html_e( 'Print Coupon', 'wp-coupon' ); ?> <i class="print icon"></i></a>
                <?php
                break;
            default:
                ?>
                <a rel="nofollow" data-type="<?php echo wpcoupon_coupon()->get_type(); ?>" data-coupon-id="<?php echo wpcoupon_coupon()->ID; ?>" href="<?php echo esc_attr( wpcoupon_coupon()->get_href() ); ?>" class="coupon-button coupon-code" data-aff-url="<?php echo esc_attr( wpcoupon_coupon()->get_go_out_url() ); ?>">
                    <span class="code-text"><?php echo esc_html( wpcoupon_coupon()->get_code() ); ?></span>
                    <span class="get-code"><?php  esc_html_e( 'Get Code', 'wp-coupon' ); ?></span>
                </a>
                <?php
        }
        ?>
        <div class="clear"></div>
        <div class="user-ratting ui icon basic buttons">
            <div class="ui button icon-popup coupon-vote" data-vote-type="up" data-coupon-id="<?php echo wpcoupon_coupon()->ID; ?>" title="<?php esc_attr_e( 'This worked', 'wp-coupon' ); ?>"><i class="smile icon"></i></div>
            <div class="ui button icon-popup coupon-vote" data-vote-type="down" data-coupon-id="<?php echo wpcoupon_coupon()->ID; ?>" title="<?php esc_attr_e( "It didn't work", 'wp-coupon' ); ?>"><i class="frown icon"></i></div>
            <div class="ui button icon-popup coupon-save" data-coupon-id="<?php echo wpcoupon_coupon()->ID; ?>" title="<?php esc_attr_e( "Save this coupon", 'wp-coupon' ); ?>" ><i class="empty star icon"></i></div>
        </div>
        <span class="voted-value"><?php printf( esc_html__( '%s%% Success', 'wp-coupon' ), round( wpcoupon_coupon()->percent_success() ) ); ?></span>
    </div>
    <div class="clear"></div>
    <?php get_template_part('loop/coupon-meta'); ?>
    <?php
    get_template_part('loop/coupon-modal');
    ?>

</div>
