<?php
class Custom_Glow_Button_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'custom_glow_button';
	}

	public function get_title() {
		return 'Raman Button';
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => 'محتوای دکمه',
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => 'متن دکمه',
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'دریافت مشاوره رایگان',
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => 'لینک دکمه',
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
		$url = empty( $settings['button_link']['url'] ) ? '#' : $settings['button_link']['url'];

		?>
		<a href="<?php echo esc_url( $url ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="ra-btn glow-button">
			<?php echo esc_html( $settings['button_text'] ); ?>
			<span class="animated-border-box-glow"></span>
			<span class="animated-border-box"></span>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#010101" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right">
				<path d="M7 7h10v10"></path>
				<path d="M7 17 17 7"></path>
			</svg>
		</a>
		<?php
	}
}