<aside class="menu">
            <div class="menu__reviews">
                <span class="menu__reviews_span" data-href="https://proweb.uz/">
                    <i class="far fa-chevron-right"></i>
                </span>
                <span class="menu__reviews_text">Оставить отзыв</span>
            </div>
            <ul class="menu__list">
                <? foreach ($pages_links as $page => $info) : ?>
                <li>
                    <a href="/?route=<?= $page?>" class="menu__list-link <?= $_GET['route'] == $page ? 'active' : null ?>">
                        <i class="<?= $info['icon'] ?>"></i>
                        <?= $info['name'] ?>
                    </a>
                </li>
                <? endforeach; ?>
            </ul>
        </aside>