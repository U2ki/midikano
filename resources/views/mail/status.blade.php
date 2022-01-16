以下のお問い合わせを受け付けました。<br>
<br><br>
名前： {{ $params['user']->name }}<br>
メールアドレス： {{ $params['user']->email }}<br>
@if ($params['user']->status === 0)
    現在のステータス： 一般<br><br>
@elseif($params['user']->status === 1)
    現在のステータス： 関係者<br><br>
@else
    現在のステータス： 管理者<br><br>
@endif

申請ステータス： {{ $params['select'] }}<br><br>

http://127.0.0.1/mypage/status?user_id={{$params['user']->id}}&status_id={{$params['status_id']}}
