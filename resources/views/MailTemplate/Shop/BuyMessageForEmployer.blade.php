{{ $shop->s_name }} {{ $shop->s_stn }}
{{ $employer->getFullName() }} 様

下記の商品が購入されましたので、
発送手続きをお願いいたします。

＜購入品＞
{{ $product->p_name }}

＜購入者情報＞
氏名　　　　　：{{ $user->getFullName() }} 様
住所　　　　　：{{ $user->u_adrs }}
メールアドレス：{{ $user->email }}




※本メールは送信専用です。
