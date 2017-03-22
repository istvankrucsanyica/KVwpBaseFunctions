#Használat

##CUSTOM POST TYPES

Hívjuk meg a **register_via_cpt_core()** függvényt, két tömböt adunk át paraméterként.

Az első tömb a létrehozni kívánt post típus *nevét*, *nevét többesszámban* és a *slug*-ot tartalmazza.

A második tömbben az argumentumok listáját vehetjük fel:
  - supports (alap értelmezetten mi jelenjen meg, pl.: cím, szerkesztő), az alábbi elemek érhetőek el:
    - title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, revisions, page-attributes, post-formats.
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


##CUSTOM POST TYPES COLUMNS

**Példányosítsuk a class-t**

```php
  $post_columns = new CPT_Columns( 'post' );

  // Ha cserélni vagy újra rendezni szerétnénk az oszlopokat, akkor második maraméterként adjuk meg a true-t
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
