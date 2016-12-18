<?php
/**
 * BreadCrumb List
 *
 * @package whilecreative
 */

if ( ! function_exists( 'whilecreative_breadcrumb' ) ) :

function whilecreative_breadcrumb( $separator = '>' ) {
	
	if ( is_single() || is_page() ) {
		$category_breadcrumbs = array();
		
		$post_cats = get_the_category();
		foreach ( $post_cats as $post_cat ) {
			$category_breadcrumb = array();
			
			$category_breadcrumb[] = array(
				'name' => esc_html( $post_cat->name ),
				'url'  => get_category_link( $post_cat->cat_ID )
			);
			
			$parent_cat_id = $post_cat->parent;
			while ( $parent_cat_id != 0 ) {
				$category_breadcrumb[] = array(
					'name' => esc_html( get_cat_name( $parent_cat_id ) ),
					'url'  => get_category_link( $post_cat->cat_ID ),
				);
				
				$parent_cat = get_category( $parent_cat_id );
				$parent_cat_id = $parent_cat->parent;
			}
			$category_breadcrumb = array_reverse( $category_breadcrumb );
			$category_breadcrumbs[] = $category_breadcrumb;
		}
		
		// 並び替え
		usort( $category_breadcrumbs, "_whilecreative_breadcrumb_sort_cmp" );
		
		// 表示
		foreach ( $category_breadcrumbs as $category_breadcrumb ) {
			_whilecreative_show_breadcrumb( $category_breadcrumb, $separator );
		}
		
	} elseif ( is_category() ) {
		
		$post_cat = get_queried_object();$category_breadcrumb = array();
		
		$category_breadcrumb[] = array(
			'name' => esc_html( $post_cat->name ),
			'url'  => '',
		);
		
		$parent_cat_id = $post_cat->parent;
		while ( $parent_cat_id != 0 ) {
			$category_breadcrumb[] = array(
				'name' => esc_html( get_cat_name( $parent_cat_id ) ),
				'url'  => get_category_link( $post_cat->cat_ID ),
			);
			
			$parent_cat = get_category( $parent_cat_id );
			$parent_cat_id = $parent_cat->parent;
		}
		$category_breadcrumb = array_reverse( $category_breadcrumb );
		$category_breadcrumbs[] = $category_breadcrumb;
		
		// 並び替え
		usort( $category_breadcrumbs, "_whilecreative_breadcrumb_sort_cmp" );
		
		// 表示
		foreach ( $category_breadcrumbs as $category_breadcrumb ) {
			_whilecreative_show_breadcrumb( $category_breadcrumb, $separator );
		}
		
	} elseif ( is_tag() ) {
		
		$breadcrumb_elements[] = array(
			'name' => 'タグ「' . single_tag_title( '', false ) . '」',
			'url'  => '',
		);
		_whilecreative_show_breadcrumb( $breadcrumb_elements, $separator );
		
	} elseif ( is_search() ) {
		
		$breadcrumb_elements[] = array(
			'name' => '「' . get_search_query() . '」で検索した結果',
			'url'  => '',
		);
		_whilecreative_show_breadcrumb( $breadcrumb_elements, $separator );
		
	} elseif ( is_404() ) {
		
		$breadcrumb_elements[] = array(
			'name' => 'お探しのページは見つかりませんでした',
			'url'  => '',
		);
		_whilecreative_show_breadcrumb( $breadcrumb_elements, $separator );
		
	} elseif ( is_date() ) {
		
		if ( is_day() ) {
			
			$breadcrumb_elements[] = array(
				'name' => get_query_var( 'year' ) . '年',
				'url'  => get_year_link( get_query_var('year') ),
			);
			$breadcrumb_elements[] = array(
				'name' => get_query_var( 'monthnum' ) . '月',
				'url'  => get_month_link( get_query_var('year'), get_query_var('monthnum') ),
			);
			$breadcrumb_elements[] = array(
				'name' => get_query_var( 'year' ) . '日',
				'url'  => '',
			);
			_whilecreative_show_breadcrumb( $breadcrumb_elements, $separator );
			
		} elseif ( is_month() ) {
			
			$breadcrumb_elements[] = array(
				'name' => get_query_var( 'year' ) . '年',
				'url'  => get_year_link( get_query_var('year') ),
			);
			$breadcrumb_elements[] = array(
				'name' => get_query_var( 'monthnum' ) . '月',
				'url'  => '',
			);
			_whilecreative_show_breadcrumb( $breadcrumb_elements, $separator );
			
		} elseif ( is_year() ) {
			
			$breadcrumb_elements[] = array(
				'name' => get_query_var( 'year' ) . '年',
				'url'  => '',
			);
			_whilecreative_show_breadcrumb( $breadcrumb_elements, $separator );
			
		}
		
	}

}
endif; // function_exists

function _whilecreative_breadcrumb_sort_cmp( $a, $b ) {
	if ( $a[0]['name'] == $b[0]['name'] ) {
		return ( count( $a ) < count( $b ) ? -1 : 1 );
	}
	return ( $a[0]['name'] < $b[0]['name'] ? -1 : 1 );
}

function _whilecreative_show_breadcrumb( $category_breadcrumb, $separator = '>' ) {
?>
	<ol class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList">
	  	<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			<a href="<?php echo home_url(); ?>" itemprop="item"><span itemprop="name">HOME</span></a>
			<span class="separator"><?php echo $separator; ?></span>
			<meta itemprop="position" content="1" />
		</li>
		<?php
		$count_content = 2;
		foreach ( $category_breadcrumb as $element ) :
		?>
	  	<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		  	<?php if ( empty( $element['url'] ) ) : ?>
			<span itemprop="item"><span itemprop="name"><?php echo $element['name']; ?></span></span>
			<?php else : ?>
			<a href="<?php echo $element['url']; ?>" itemprop="item"><span itemprop="name"><?php echo $element['name']; ?></span></a>
			<?php endif; ?>
			<span class="separator"><?php echo $separator; ?></span>
			<meta itemprop="position" content="<?php echo $count_content; ?>" />
		</li>
		<?php
		$count_content++;
		endforeach;
		?>
	</ol>
<?php
}