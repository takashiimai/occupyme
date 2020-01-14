<div class=" class="list-group">
    <div class="d-block d-lg-none mb-3">
    <a href="/mypage/index" class="btn btn-sm btn-primary">TOP</a>
    <a href="/mypage/purchase" class="btn btn-sm btn-primary">購入履歴</a>
    <a href="/mypage/report" class="btn btn-sm btn-primary">月次レポート</a>
    <a href="/mypage/config" class="btn btn-sm btn-primary">登録情報</a>
    <a href="/mypage/faq" class="btn btn-sm btn-primary">FAQ</a>
    <a href="/mypage/logout" class="btn btn-sm btn-primary">ログアウト</a>
    </div>
    <ul class="d-none d-lg-block">
        <li class="list-group-itemlist-group-item-action <?= in_array(uri_string(), ['/mypage/index', '/mypage']) ? 'list-group-item-primary active' : '' ?>"><a href="/mypage/index">TOP</a></li>
        <li class="list-group-item list-group-item-action <?= in_array(uri_string(), ['/mypage/purchase']) ? 'list-group-item-primary active' : '' ?>"><a href="/mypage/purchase">購入履歴</a></li>
        <li class="list-group-item list-group-item-action <?= in_array(uri_string(), ['/mypage/report']) ? 'list-group-item-primary active' : '' ?>"><a href="/mypage/report">月次レポート</a></li>
        <li class="list-group-item list-group-item-action <?= in_array(uri_string(), ['/mypage/config']) ? 'list-group-item-primary active' : '' ?>"><a href="/mypage/config">登録情報</a></li>
        <li class="list-group-item list-group-item-action <?= in_array(uri_string(), ['/mypage/faq']) ? 'list-group-item-primary active' : '' ?>"><a href="/mypage/faq">FAQ</a></li>
        <li class="list-group-item"><a href="/mypage/logout">ログアウト</a></li>
    </ul>
</div>
