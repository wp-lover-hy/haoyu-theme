<?php
/**
 * Custom Footer for HaoYu AI Child Theme
 * - Three-column layout: brand intro, quick links, contact
 * - Dark background with wave image handled in CSS
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

    </div><!-- .site-content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="inside-site-info grid-footer">
            <div class="footer-col footer-brand">
                <h2 class="site-title">好雨AI</h2>
                <p>十年技术沉淀，只为交付卓越。融合一线互联网大厂实战经验，打造高性能、高体验的数字化解决方案。</p>
                <p>致力于以精湛技术，助推品牌成长。</p>
            </div>

            <div class="footer-col footer-links">
                <h3 class="footer-heading">快速链接</h3>
                <?php
                if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                    ) );
                } else {
                    echo '<ul class="footer-menu"><li><a href="' . esc_url( home_url( '/' ) ) . '">首页</a></li></ul>';
                }
                ?>
            </div>
            

            <div class="footer-col footer-contact">
                <h3 class="footer-heading">联系我们</h3>
                <ul class="contact-list">
                    <li>contact@excellent-delivery.com</li>
                    <li>+86 1XX XXXX XXXX</li>
                </ul>
            </div>
        </div>

        <?php if ( has_nav_menu( 'friendship_links_menu' ) ) : ?>
            <div class="friend-links">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'friendship_links_menu',
                    'menu_class'     => 'friend-links-menu',
                    'container'      => false,
                    'depth'          => 1,
                ) );
                ?>
            </div>
        <?php endif; ?>

        <div class="site-info copyright">
            <span>© <?php echo esc_html( date_i18n( 'Y' ) ); ?> 好雨AI. 版权所有。</span>
            <span class="icp">
                <a href="https://beian.miit.gov.cn/" target="_blank" rel="noopener">京ICP备XXXXXX号</a>
            </span>
        </div>
    </footer>

<?php wp_footer(); ?>

    </body>
</html>


