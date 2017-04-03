# KVwpBaseFunctions
>v1.0.6

&nbsp; 

# Tartalomjegyzék
* Használat
* Egyedi poszt típus létrehozása
* Poszt típusok oszlopainak kezelése/rendezése
* QueryBar
* Süti figyelmeztetés
* Egyedi taxonómia létrehozása

&nbsp; 

# Használat

1. Hozz létre egy **includes** könyvtárat a téma könyvtárán belül, töltsd le a repo tartalmát.
2. A *functions.php* file-ba **require_once** funkció segítségével hívd meg az **includes/theme-functions.php** file-t.

  ```php
  require_once ( get_template_directory() . '/includes/theme-functions.php' );
  ```

3. A további szükséges módosításokat az **includes/theme-functions.php** file-ban végezd el.

&nbsp; 

# Egyedi poszt típus létrehozása

>@since v1.0.1  
>thanks for [Justin Sternberg] (https://github.com/Mte90/CPT_Core)

&nbsp;

Tegyük elérhetővé a használat:

```php
define( 'ENABLE_CUSTOM_POST_TYPES', TRUE );
```
Hozz létre a **types** mappán belül egy új file-t, az elnevezésben kövesd az alábbi patternt: CUSTOM_POST_TYPES_NAME-post.php. Majd a létrehozott file-t add hozzá a *$includes* tömbhöz.

A létrehoztt file-ban hívjuk meg a **register_via_cpt_core()** függvényt, két tömböt adunk át paraméterként.

Az első tömb a létrehozni kívánt post típus *nevét*, *nevét többesszámban* és a *slug*-ot tartalmazza.

A második tömbben az argumentumok listáját vehetjük fel:  
- supports (alap értelmezetten mi jelenjen meg, pl.: cím, szerkesztő), az alábbi elemek érhetőek el:  
&nbsp;&nbsp; - title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, revisions, page-attributes, post-formats.  
- megadható a megjelenő ikon is, az ikonok listáját itt találod: [Dashicons](https://developer.wordpress.org/resource/dashicons/#admin-tools)

További információ: [register_post_type()](https://developer.wordpress.org/reference/functions/register_post_type/)

```php
  register_via_cpt_core(
    array(
      __( 'Vélemény', TEXTDOMAIN ),
      __( 'Vélemények', TEXTDOMAIN ),
      'velemenyek-items'
    ),
    array(
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon' => 'dashicons-megaphone'
    )
  );
```

&nbsp;

# Poszt típusok oszlopainak kezelése/rendezése
>@since v1.0.1  
>thanks for [Ohad Raz] (https://en.bainternet.info/custom-post-types-columns/)

&nbsp;

Tegyük elérhetővé a használat:

```php
define( 'ENABLE_CUSTOM_POST_TYPES_COLUMNS', TRUE );
```

**Példányosítsuk a class-t**

```php
  $post_columns = new CPT_Columns( 'post' );

  // Ha cserélni vagy újra rendezni szerétnénk az oszlopokat, 
  // akkor második paraméterként adjuk meg a true-t
  $post_columns = new CPT_Columns( 'post', true );
```

**Adjuk hozzá példaként a title (natív) oszlopot**

```php
  $post_columns->add_column('title',
    array(
      'label'    => __('Title'),
      'type'     => 'native',
      'sortable' => true
    )
  );
```

**Ha használunk thumbnailt, akkor azt is egyszerűen hozzáadhatjuk**

```php
  $post_columns->add_column('post_thumb',
    array(
      'label' => __('Thumb'),
      'type'  => 'thumb',
      'size'  => array('80,80')
    )
  );
```

**Taxonómia hozzáadása**

```php
  $post_columns->add_column('custom_tax_id',
    array(
      'label'    => __('Custom Taxonomy'),
      'type'     => 'custom_tax',
      'taxonomy' => 'category' //taxonomy name
    )
  );
```

**Egyedi mező (custom field) hozzáadása**

```php
  $post_columns->add_column('price',
    array(
      'label'    => __('Custom Field'),
      'type'     => 'post_meta',
      'meta_key' => 'price', // meta_key
      'orderby'  => 'meta_value', // meta_value, meta_value_num
      'sortable' => true,
      'prefix'   => "$",
      'suffix'   => "",
      'def'      => "", // default value in case post meta not found
    )
  );
```

**Oszlop eltávolítása (pl.: dátum)**

```php
  $post_columns->remove_column('date');
```

&nbsp;

#Süti figyelmeztetés
>@since 1.0.6

&nbsp;

Tegyük elérhetővé a használat:

```php
define( 'ENABLE_COOKIE_NOTICE', TRUE );
```
Változtassuk meg a szövegeket, ha szükséges

```php
$cookieNotice = new KVBF_CookieNotice();
$cookieNotice->setTime( '+30 days' );
$cookieNotice->setName( 'cookieNoticeAccepted' );
$cookieNotice->setButonName( 'Elfogadom' );
$cookieNotice->setMessage( 'Kedves Látogató! Tájékoztatjuk, hogy a honlap felhasználói élmény fokozásának érdekében sütiket alkalmazunk. A honlapunk használatával ön a tájékoztatásunkat tudomásul veszi.' );
$cookieNotice->checkCookie();
```

A ```HTML``` váz a következőképpen épül fel, nem tartalmaz ```CSS```-t, kedvünk szerinti kinézetet, pozicítót adhatunk neki :)

```html
<div class="cookie-notice-container">
	<div class="cookie-notice-message"> ÜZENET HELYE </div>
    <div class="cookie-notice-button">
    	<button id="accept_cookie">GOMB SZÖVEGE</button>
    </div>
</div>
```

&nbsp;

#QueryBar
>@since v1.0.2

&nbsp;

Egy egyszerű megjelentítő, ami a információkat ad számunka a query-k számáról, futási idejükről, memória használatról.

Tegyük elérhetővé a használat:

```php
define( 'SHOW_QUERY_BAR', TRUE );
```
![](http://istvankrucsanyica.com/query_bar.jpg)

&nbsp;

#Egyedi taxonómia létrehozása
>@since 1.0.7

>thanks for [Justin Sternberg] (https://github.com/WebDevStudios/Taxonomy_Core)

&nbsp;

Tegyük elérhetővé a használatát:

```php
define( 'ENABLE_CUSTOM_TAXONOMY', TRUE );
```

```php
$valami = array(
	__( 'Valami', 'your-text-domain' ),
	__( 'Valamik', 'your-text-domain' ),
	'valami-tax'
);
```
Következő lépésben a 'Valami' taxonómiát regisztráljuk hozzá a 'Nagyon valami' poszt típushoz.

```php
$valamik = register_via_taxonomy_core( $valami, array(), array( 'nagyon-valami' ) );
```

&nbsp;

**Happy coding :)**

