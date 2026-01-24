<?php
class Raman_En_Title_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'raman_en_title';
	}

	public function get_title() {
		return esc_html__( 'عنوان انگلیسی رامان', 'raman-agency' );
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'raman-agency' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => esc_html__( 'Title', 'raman-agency' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Portfolio', 'raman-agency' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = $settings['title_text'];
		?>
		<div class="section-en-title section-en-title-other-page glass-bc">
			<img src="https://raman.agency/dev/wp-content/themes/raman/assets/images/green-light.png.webp" alt="Raman Icon">
			<?php echo esc_html( $title ); ?>
		</div>
		<?php
	}
}