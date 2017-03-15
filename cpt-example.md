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
