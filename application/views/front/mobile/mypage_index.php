<br>

<?php include("layout_mypage_menu.php"); ?>

<?php $link = "http://". $_SERVER['SERVER_NAME'] . "/lp?" . $user['affiliate_auth']; ?>

<div pure-u-1-1" style="text-align:left">
        <form class="pure-form pure-form-stacked">
            <fieldset>
                <div class="pure-control-group">
                    <label>あなたのアフィリエイトURL</label>
                    <input class="pure-input-1" id="name" type="text" value="<?= $link; ?>">
                </div>
            </fieldset>

            <fieldset>
                <div class="pure-control-group">
                    <label>テキストリンク用</label>
                    <textarea class="pure-input-1" rows=5 style="text-align:left">
<a href="<?= $link; ?>">「恋人募集中」グッズ販売中。高額アフィリエイトも展開中！</a>
                    </textarea>
                </div>
            </fieldset>

                <fieldset>
                    <div class="pure-control-group">
                        <label>バナーリンク用</label>
                        <textarea class="pure-input-1" rows=4 style="text-align:left">
<a href="<?= $link; ?>"><img src="affiliate.png"></a>
                        </textarea>
                    </div>
                </fieldset>

        </form>

            <div style="margin:40px auto 0 auto">
            <img src="/images/affiliate.png"><br>
            ↑バナーです。直リンクせずダウンロードしてご使用ください。
            </div>

</div>
<br><br><br>

