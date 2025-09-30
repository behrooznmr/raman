<?php
/**
 * Class Name: WP_Bootstrap_Navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 5 navigation style.
 * Version: 1.0
 */

/*class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}

	public function start_el(  &$output, $item, $depth = 0, $args = null, $id = 0  ) {
		$indent = ( $depth ) ? str_repeat("\t", $depth) : '';

		$li_classes = [];
		$link_classes = ['nav-link'];

		$is_dropdown = in_array('menu-item-has-children', $item->classes);

		if ( $depth === 0 && $is_dropdown ) {
			$li_classes[] = 'nav-item dropdown';
			$link_classes[] = 'dropdown-toggle';
		} elseif ( $depth === 0 ) {
			$li_classes[] = 'nav-item';
		}

		if ( $depth > 0 && $is_dropdown ) {
			$li_classes[] = 'dropdown-submenu';
			$link_classes[] = 'dropdown-toggle';
		}

		$li_class_names = implode(' ', array_filter($li_classes));
		$link_class_names = implode(' ', array_filter($link_classes));

		$atts = [];
		$atts['class'] = $link_class_names;

		if ( $is_dropdown && $depth === 0 ) {
			$atts['data-bs-toggle'] = 'dropdown';
			$atts['aria-expanded'] = 'false';
			$atts['role'] = 'button';
		}

		$atts['href'] = ! empty( $item->url ) ? $item->url : '';

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
			$attributes .= ' ' . $attr . '="' . $value . '"';
		}

		$item_output = $args->before;
		$item_output .= '<li class="' . esc_attr( $li_class_names ) . '">';
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= $item_output;
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}
}*/