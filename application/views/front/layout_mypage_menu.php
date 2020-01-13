<div class=" class="list-group"">
    <ul>
        <li class="list-group-item list-group-item-action <?= in_array(uri_string(), ['/mypage/index', '/mypage']) ? 'list-group-item-warning active' : '' ?>"><a href="/mypage/index">TOP</a></li>
        <li class="list-group-item list-group-item-action <?= in_array(uri_string(), ['/mypage/report']) ? 'list-group-item-warning active' : '' ?>"><a href="/mypage/report">月次レポート</a></li>
        <li class="list-group-item list-group-item-action <?= in_array(uri_string(), ['/mypage/config']) ? 'list-group-item-warning active' : '' ?>"><a href="/mypage/config">登録情報</a></li>
        <li class="list-group-item list-group-item-action <?= in_array(uri_string(), ['/mypage/faq']) ? 'list-group-item-warning active' : '' ?>"><a href="/mypage/faq">FAQ</a></li>
        <li class="list-group-item"><a href="/mypage/logout">ログアウト</a></li>
    </ul>
</div>
