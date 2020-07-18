        </div>
        <footer class="footer">
            <a href="/" class="logo">
                <img src="<?=bloginfo('template_url')?>/src/img/logo.png" alt="logo" />
            </a>
            <p class="footer_description"><?=pll_e('Литейные добавки для сталелитейных производств: шлакообразующие смеси, теплоизоляционные покрывные смеси для промковша и кристаллизатора.')?></p>
            <div class="footer_contacts">
                <?php
                    $query = new WP_Query('page_id=26');
                    if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post();
                    $phone = str_replace(array(' ', '(', ')', '-'), '', get_field('phone'));
                ?>
                <a href="tel:<?php echo $phone; ?>" class="contact-number"><?php the_field('phone') ?></a>
                <a href="mailto:<?php the_field('email') ?>" class="contact-email"><?php the_field('email') ?></a>
                <p class="contact-address"><?php the_field('address') ?></p>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            <div class="footer_copyright">
                <p class="copy">&copy; ekos <?=date("Y")?></p>
                <a href="<?=bloginfo("url")?>/privacy-policy/" class="privacy">Политика обработки персональных данных</a>
            </div>
        </footer>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153444305-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-153444305-1');
        </script>

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(56404867, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/56404867" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <?php wp_footer(); ?>
    </body>
</html>