Where are the image sizes set?
Let’s take a default theme like Twenty Seventeen and look to see where the image sizes come from.

Interestingly, the sizes are not set on the theme!  WooCommerce has default image sizes for all the default themes:

<?php

add_theme_support( 'woocommerce', array(
	'thumbnail_image_width' => 250,
	'single_image_width'    => 350,
	) );
}
view rawseventeen.php hosted with ❤ by GitHub
As you can see, WooCommerce sets the thumbnail_image_width to 250, and the single_image_width to 350.  The gallery_thumbnail however, is not set so it uses the default 100 x 100 pixel size from WooCommerce.

What if my theme doesn’t declare a custom image size?

If that’s the case, the woocommerce_thumbnail and the woocommerce_single images will be set through the Customizer:


The gallery_thumbnailis going to use the default 100 pixels in this case.

What about the Storefront theme?

Storefront currently set’s the woocommerce_single and woocommerce_thumbnail sizes like this:

<?php
add_theme_support( 'woocommerce', apply_filters( 'storefront_woocommerce_args', array(
  'single_image_width'    => 416,
  'thumbnail_image_width' => 324,
  'product_grid'          => array(
    'default_columns' => 3,
    'default_rows'    => 4,
    'min_columns'     => 1,
    'max_columns'     => 6,
    'min_rows'        => 1
  )
) ) );
view rawstorefront-image-sizes.php hosted with ❤ by GitHub
How do I override an image size?
woocommerce_single
Here’s an example of how you can override the woocommerce-single image:

<?php
add_filter( 'woocommerce_get_image_size_single', function( $size ) {
	return array(
		'width'  => 400,
		'height' => '',
		'crop'   => 0,
	);
} );
view rawsingle-image.php hosted with ❤ by GitHub
In this example, we’re setting the width to 400, the height to “automatic”, and we are not cropping the image by default.

If you wanted to set the image to a specific size and crop it to fit, you would do this:

<?php

add_filter( 'woocommerce_get_image_size_single', function( $size ) {
	return array(
		'width'  => 500,
		'height' => 500,
		'crop'   => 1,
	);
} );
view rawsingle-image.php hosted with ❤ by GitHub
woocommerce_thumbnail
<?php

add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
	return array(
		'width'  => 500,
		'height' => 500,
		'crop'   => 1,
	);
} );
view rawthumbnail-size.php hosted with ❤ by GitHub
This snippet will change the woocommerce_thumbnail image to 500 x 500 pixels and crop the image.

woocommerce_gallery_thumbnail
<?php
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
	return array(
		'width'  => 400,
		'height' => 400,
		'crop'   => 1,
	);
} );
view rawgallery-thumbnail.php hosted with ❤ by GitHub
The snippet above will make the single product gallery images 400 x 400 pixels.
