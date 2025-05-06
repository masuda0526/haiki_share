<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $c_id
 * @property int $g_id 分類
 * @property int $sort ソート用
 * @property string $c_name カテゴリー名
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Group|null $group
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereGId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employers
 *
 * @property string $e_id 従業員ID 店舗コード＋従業員コード3桁
 * @property string $s_id 店舗ID
 * @property string $e_cd 従業員コード
 * @property string $email 従業員メールアドレス
 * @property string $password パスワード
 * @property string $auth 従業員権限
 * @property string $e_sei 従業員名（姓）
 * @property string $e_mei 従業員名（名前）
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Employers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employers query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employers whereAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employers whereECd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employers whereEId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employers whereEMei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employers whereESei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employers whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employers wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employers whereSId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employers whereUpdatedAt($value)
 */
	class Employers extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Group
 *
 * @property int $g_id 分類ID
 * @property int $sort ソート用
 * @property string $g_name 分類名
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $category
 * @property-read int|null $category_count
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 */
	class Group extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Prefecture
 *
 * @property string $pref_id 都道府県ID
 * @property int $sort ソート用
 * @property int $r_id 地方ID
 * @property string $pref_name 都道府県名
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture wherePrefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture wherePrefName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereRId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereUpdatedAt($value)
 */
	class Prefecture extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property string $p_id 商品ID
 * @property string $s_id 出品店舗ID
 * @property string $e_id 出品者ID
 * @property int|null $c_id カテゴリID
 * @property string $p_name 商品名
 * @property string|null $p_img 画像保存先
 * @property int $price 定価
 * @property int $dis_price 割引価格
 * @property string|null $ex_dt 賞味期限
 * @property int|null $p_status 出品状況 0:出品中 1:保留中 2:出品取消 3:販売済
 * @property string|null $u_id 購入者ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDisPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereEId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @property int $id 地方ID
 * @property int $sort ソート用
 * @property string $r_name 地方名
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereRName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shop
 *
 * @property string $s_id 店舗ID C＋本店コード３桁＋支店コード３桁
 * @property string $s_pcd 本店コード
 * @property string $s_ccd 支店コード：本店は000
 * @property string $s_name 本店名
 * @property string $s_stn 支店名
 * @property string|null $s_img 店舗画像
 * @property string $s_pref 都道府県ID
 * @property string $s_adrs 店舗住所
 * @property int $s_status 店舗ステータス 0:営業中 1:休業中 2:閉店
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSAdrs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSCcd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSPcd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSPref($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereSStn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereUpdatedAt($value)
 */
	class Shop extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $u_id
 * @property string $u_sei 利用者名（姓）
 * @property string $u_mei 利用者名（名前）
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $u_pref 居住地（県）
 * @property string $u_adrs 住所
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Prefecture|null $pref
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUAdrs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUMei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUPref($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUSei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\authority
 *
 * @property string $a_id 権限ID
 * @property int $sort ソート用
 * @property string $a_name 権限名
 * @property string|null $a_explain 権限説明
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|authority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|authority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|authority query()
 * @method static \Illuminate\Database\Eloquent\Builder|authority whereAExplain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|authority whereAId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|authority whereAName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|authority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|authority whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|authority whereUpdatedAt($value)
 */
	class authority extends \Eloquent {}
}

