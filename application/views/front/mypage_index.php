<br>
<div class="pure-g">
    <div class="pure-u-1-12"></div>

    <div class="pure-u-1-6">
        <?php include("layout_mypage_menu.php"); ?>
    </div>

    <div class="pure-u-2-3" style="margin-left:50px; text-align:left">
<?php $link = "http://". $_SERVER['SERVER_NAME'] . "/lp?" . $user['affiliate_auth']; ?>
            <form class="pure-form pure-form-aligned">
                <fieldset>
                    <div class="pure-control-group">
                        <label>あなたのアフィリエイトURL</label>
                        <input class="pure-input-2-3" id="name" type="text" value="<?= $link; ?>">
                    </div>
                </fieldset>

                <fieldset>
                    <div class="pure-control-group">
                        <label>テキストリンク用</label>
                        <textarea cols=70 rows=5 style="text-align:left">
<a href="<?= $link; ?>">「恋人募集中」グッズ販売中。高額アフィリエイトも展開中！</a>
                        </textarea>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="pure-control-group">
                        <label>バナーリンク用</label>
                        <textarea cols=70 rows=4 style="text-align:left">
<a href="<?= $link; ?>"><img src="affiliate.png"></a>
                        </textarea>
                    </div>
                </fieldset>

            </form>

            <div style="margin:40px auto">
            <img src="/images/affiliate.png"><br>
            ↑バナーです。直リンクせずダウンロードしてご使用ください。
            </div>

    </div>

    <div class="pure-u-1-12"></div>
</div>

