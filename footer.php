			</div><!-- .site -->

			<?php 
			$socialMediaLinks = social_media_links();
			$footLinksLeft = get_field("footer_links_left","option");
			$footLinksRight = get_field("footer_links_right","option");
			?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group">

				<div class="section-inner">
					<?php if ($socialMediaLinks) { ?>
					<div id="footcol1" class="social-media">
						<?php foreach ($socialMediaLinks as $k=>$s) { ?>
							<a href="<?php echo $s[1] ?>" target="_blank" class="icon-<?php echo $k ?>"><i class="<?php echo $s[0] ?>" aria-label="<?php echo $k ?>"></i></a>
						<?php } ?>
					</div>
					<?php } ?>
					<div id="footcol2" class="footer-credits">

						<div class="footer-links">
							<div class="footlinksleft">
								<p class="footer-copyright">&copy;
									<?php
									echo date_i18n( _x( 'Y', 'copyright date format', 'idahograce' ) );
									?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
								</p><!-- .footer-copyright -->

								<?php if ($footLinksLeft) { ?>
									<div class="links">
										<?php foreach ($footLinksLeft as $b) { 
											$btn = $b['link'];
											$target = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
											?>
											<a href="<?php echo $btn['url'] ?>" target="<?php echo $target ?>"><?php echo $btn['title'] ?></a>
										<?php } ?>
									</div>
								<?php } ?>
							</div>

							<?php if ($footLinksRight) { ?>
							<div class="footlinksright">
								<?php foreach ($footLinksRight as $b) { 
									$btn = $b['link'];
									$target = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
									?>
									<a href="<?php echo $btn['url'] ?>" target="<?php echo $target ?>"><?php echo $btn['title'] ?></a>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						
					</div>

				</div><!-- .section-inner -->
			</footer><!-- #site-footer -->
		<?php wp_footer(); ?>
	</body>
</html>
