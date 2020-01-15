<div class="container">
    <div class="row">
        <div class="col-3"><img class="col-12" src="/images/lovers.png"></div>
        <div class="col-9"><img class="col-12" src="/images/top_message.png"></div>
    </div>

    <div class="row mt-5">
        <div class="col-12 col-lg-2">
<?php include "ad/adsense_no1.php" ?>
        </div>
        <div class="col-12 col-lg-8">
            <div class="alert alert-danger">
                大変ご好評をいただき誠にありがとうございます。
                予想をはるかに超えるお申込みのため、事務局側の処理に大幅な遅れが生じている状態です。
                大変申し訳ございませんが、お申込みが一定数を超えましたらお申込みを一旦中断させていただく予定です。お申込みをご検討されている方はお急ぎくださいませ。
            </div>

            <h1 class="h2 mt-5 mb-3 text-center">
                高額アフィリエイト参加権付きオリジナルグッズ
            </h1>

            <div class="alert alert-primary">
                下記オリジナルグッズをご購入いただいた場合、アフィリエイト報酬は、なんと50,000円！！
                奮ってご参加ください。
            </div>

            <div class="row">
                <div class="offset-lg-2 col-6 col-lg-4">
                    <div class="card img-thumbnail">
                        <img data-action="popup" class="img-responsive img-thumbnail pointer" src="/images/item_keyholder.jpg">
                        <div class="card-body px-2 py-3">
                            <h5 class="card-title">キーホルダー</h5>
                            <p class="card-text">白地に黒のロゴ入りキーホルダーです。</p>
                            <p class="card-text">
                                価格：100,000円（税込）
                            </p>
                            <p class="text-danger">
                                成果報酬：50,000円
                            </p>
                            <p class="mb-0 text-center"><a href="/purchase/keyholder" class="btn btn-primary btn-sm">購入画面に進む</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="card img-thumbnail">
                        <img data-action="popup" class="img-responsive img-thumbnail pointer" src="/images/item_badge.jpg">
                        <div class="card-body px-2 py-3">
                            <h5 class="card-title">カンバッヂ</h5>
                            <p class="card-text">白地に黒のロゴ入りカンバッヂです。</p>
                            <p class="card-text">
                                価格：100,000円（税込）
                            </p>
                            <p class="text-danger">
                                成果報酬：50,000円
                            </p>
                            <p class="mb-0 text-center"><a href="/purchase/badge" class="btn btn-primary btn-sm">購入画面に進む</a></p>
                        </div>
                    </div>
                </div>
            </div>

<?php if (!isset($login) || !$login): ?>
            <div class="row my-5">
                <div class="col-6 offset-lg-1 col-lg-4">
<?php include "ad/adsense_no1.php" ?>
                </div>
                <div class="col-6 offset-lg-2 col-lg-4">
<?php include "ad/adsense_no1.php" ?>
                </div>
            </div>
            <div class="alert alert-info text-center mt-5">
                購入せずにアフィリエイトに参加する場合は下記よりご参加ください
            </div>
            <div class="text-center mb-5">
                <a href="/affiliate" class="btn btn-primary">リンク会員として<br>アフィリエイトに参加する</a>
            </div>
<?php endif; ?>
            <div class="text-center mb-5">
<?php include "ad/adsense_no1.php" ?>
            </div>
        </div>
        <div class="col-12 col-lg-2">
<?php include "ad/adsense_no1.php" ?>
        </div>
    </div>

</div>


<script>
$(function() {
    $(document).on('click', '[data-action="popup"]', function(e) {
        $.Zebra_Dialog({
            'animation_speed_hide':     0 ,
            'animation_speed_show':     0 ,
            'max_height':               480,
            'width':                    640,
            'type': false,
            'message': '<img style="width: 100%; heght: 100%" src="' + $(this).attr("src") + '">',
            'title':   '　',
            'buttons': [{
                caption: '閉じる', callback: function() {
                }
            }]
        });
    });
});
</script>
