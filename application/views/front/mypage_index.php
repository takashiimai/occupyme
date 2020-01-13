<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-lg-3">
<?php include("layout_mypage_menu.php"); ?>
        </div>

        <div class="col-12 col-lg-9">
<?php $link = "https://". $_SERVER['SERVER_NAME'] . "/lp?" . $user['affiliate_auth']; ?>
            <form>
                <div class="form-group row">
                    <label class="col-12 col-lg-4">あなたのアフィリエイトURL</label>
                    <div class="col-12 col-lg-8">
                        <input class="form-control" id="name" type="text" value="<?= $link; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-lg-4">テキストリンク用タグ</label>
                    <div class="col-12 col-lg-8">
                        <textarea class="form-control" cols=70 rows=5>
<a href="<?= $link; ?>">「恋人募集中」オリジナルグッズ販売中。高額アフィリエイトも実施中！</a>
                        </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-lg-4">バナーリンク用タグ</label>
                    <div class="col-12 col-lg-8">
                        <textarea class="form-control" cols=70 rows=4>
<a href="<?= $link; ?>"><img src="affiliate.png"></a>
                        </textarea>
                    </div>
                    <div class="col-12 offset-lg-4 col-lg-8 mt-3">
                        <img src="/images/affiliate.png"><br>
                        ↑バナーです。直リンクせずダウンロードしてご使用ください。
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

