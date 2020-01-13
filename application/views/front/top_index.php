<div class="container">
    <div class="row">
        <div class="col-3"><img class="col-12" src="/images/lovers.png"></div>
        <div class="col-9"><img class="col-12" src="/images/top_message.png"></div>
    </div>

    <div class="row mt-5">
        <div class="offset-lg-2 col-12 col-lg-8 alert alert-danger">
            大変ご好評をいただき誠にありがとうございます。
            予想をはるかに超えるお申込みのため、事務局側の処理に大幅な遅れが生じている状態です。
            大変申し訳ございませんが、お申込みが一定数を超えましたらお申込みを一旦中断させていただく予定です。お申込みをご検討されている方はお急ぎくださいませ。
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-12">
            <h1 class="h2 my-3 text-center">
                高額アフィリエイト参加権付きオリジナルグッズ
            </h1>
        </div>

        <div class="offset-lg-3 col-6 col-lg-3">
            <div class="card img-thumbnail">
                <img data-action="popup" class="img-responsive img-thumbnail pointer" src="/images/item_keyholder.jpg">
                <div class="card-body px-2 py-3">
                    <h5 class="card-title">キーホルダー</h5>
                    <p class="card-text">白地に黒のロゴ入りキーホルダーです。</p>
                    <p class="card-text">
                        価格：100,000円（税込）
                    </p>
                    <p class="mb-0 text-center"><a href="#" class="btn btn-primary btn-sm">購入に進む</a></p>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card img-thumbnail">
                <img data-action="popup" class="img-responsive img-thumbnail pointer" src="/images/item_badge.jpg">
                <div class="card-body px-2 py-3">
                    <h5 class="card-title">カンバッヂ</h5>
                    <p class="card-text">白地に黒のロゴ入りカンバッヂです。</p>
                    <p class="card-text">
                        価格：100,000円（税込）
                    </p>
                    <p class="mb-0 text-center"><a href="#" class="btn btn-primary btn-sm">購入に進む</a></p>
                </div>
            </div>
        </div>

        <div class="offset-lg-3 col-12 col-lg-6 alert alert-primary mt-5">
            上記のオリジナルグッズをご購入いただきますと、アフィリエイトに参加いただけます。
            アフィリエイト報酬は、な、な、なんと、50,000円！！
            奮ってご参加ください。参加手順は<a href="">こちら</a>。
        </div>



    </div>
</div>

<div class="mb-5">
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