<?php
/**
 * The Setup Wizard mockup page for Paid Memberships Pro
 */
if ( ! empty( $_REQUEST['step'] ) ) {
	$active_step = $_REQUEST['step'];
} else {
	$active_step = 'general';
}
?>
<div class="pmpro-wizard">
	<div style="background-image: url('/wp-content/plugins/paid-memberships-pro/images/bg_icons-white.png');background-repeat: repeat;background-size: 50%;position: absolute; top: 0; left: 0; width: 100%;height: 100vh;opacity: .5; z-index: -1;"></div>
	<div class="pmpro-wizard__header">
		<a class="pmpro_logo" title="Paid Memberships Pro - Membership Plugin for WordPress" target="_blank" rel="noopener noreferrer" href="https://www.paidmembershipspro.com/?utm_source=plugin&utm_medium=pmpro-admin-header&utm_campaign=homepage"><img src="<?php echo esc_url( PMPRO_URL . '/images/Paid-Memberships-Pro.png' ); ?>" width="350" height="75" border="0" alt="Paid Memberships Pro(c) - All Rights Reserved" /></a>
		<div class="pmpro-stepper">
			<div class="pmpro-stepper__steps">
				<?php
					$setup_steps = array(
						'general' => __( 'General Info', 'paid-memberships-pro' ),
						'memberships' => __( 'Memberships', 'paid-memberships-pro' ),
						'payments' => __( 'Payments', 'paid-memberships-pro' ),
						'advanced' => __( 'Advanced', 'paid-memberships-pro' ),
						'done' => __( 'All Set!', 'paid-memberships-pro' ),
					);
					$count = 0;
					foreach ( $setup_steps as $setup_step => $name ) {
						// Build the selectors for the step based on wizard flow.
						$classes = array();
						$classes[] = 'pmpro-stepper__step';
						if ( $setup_step === $active_step ) {
							$classes[] = 'is-active';
						}
						$class = implode( ' ', array_unique( $classes ) );
						$count++;
						?>
						<div class="<?php echo esc_attr( $class ); ?>">
							<div class="pmpro-stepper__step-icon">
								<span class="pmpro-stepper__step-number"><?php echo esc_html( $count ); ?></span>
							</div>
							<span class="pmpro-stepper__step-label">
								<?php echo esc_html( $name ); ?>
							</span>
						</div>
						<div class="pmpro-stepper__step-divider"></div>
						<?php
					}
				?>
			</div>
		</div>
	</div>

	<div class="pmpro-wizard__container">
		<?php if ( $active_step === 'general' ) {
				include "step-1.php";
		 } elseif ( $active_step === 'memberships' ) { 
				include "step-2.php";
			} elseif ( $active_step === 'payments' ) {
				include "step-3.php";
		 } elseif ( $active_step == 'advanced' ) {
				include "step-4.php";
		} elseif ( $active_step == 'done' ) {
			include "step-5.php";
		} ?>
		<p class="pmpro-wizard__exit"><a href=""><?php esc_html_e( 'Exit Wizard and Return to Dashboard', 'paid-memberships-pro' ); ?></a></p>
	</div> <!-- end pmpro-wizard__container -->
</div> <!-- end pmpro-wizard -->
<?php
