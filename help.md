La manera més senzilla és fer servir **Leaflet** amb els mapes d'**OpenStreetMap**. És gratuït i no necessita cap clau d'API. No he tocat cap fitxer; aquí tens com fer-ho pas a pas.

## 1. Guardar la ruta a la base de dades

Cada activitat necessita els seus punts GPS. L'opció més fàcil és una columna nova amb un JSON de coordenades. Com que encara no tinc l'estructura de la teva taula d'activitats, aquí la dic `activitat`; canvia el nom pel que facis servir:

```sql
ALTER TABLE activitat ADD COLUMN ruta JSON NULL;

UPDATE activitat
SET ruta = '[[42.3700,-3.5150],[42.3720,-3.5100],[42.3750,-3.5080],[42.3730,-3.5030]]'
WHERE id_activitat = 1;
```

Cada parell és `[latitud, longitud]`. Si més endavant vols pujar fitxers **GPX** (els que exporten Strava i Garmin), pots guardar el fitxer i llegir-lo amb el plugin `leaflet-gpx`. Per començar, però, el JSON n'hi ha prou.

## 2. Carregar Leaflet al `<head>` de profile.php

```html
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
```

## 3. Un `div` per al mapa dins de cada activitat

Dins del bucle de les activitats:

```php
<?php if (!empty($a['ruta'])): ?>
    <div class="activity-map"
         id="map-<?= $a['id_activitat'] ?>"
         data-ruta='<?= htmlspecialchars($a['ruta'], ENT_QUOTES) ?>'></div>
<?php endif; ?>
```

Al CSS:

```css
.activity-map {
    height: 200px;
    border-radius: 10px;
    margin-top: 10px;
}
```

El mapa ha de tenir una **alçada fixa**. Si no en té, no es veu res.

## 4. Dibuixar la ruta amb JavaScript

Posa-ho al final, just abans de `</body>`:

```html
<script>
document.querySelectorAll('.activity-map').forEach(el => {
    const punts = JSON.parse(el.dataset.ruta);

    const map = L.map(el, { scrollWheelZoom: false });
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    const linia = L.polyline(punts, { color: '#ea6b24', weight: 4 }).addTo(map);
    map.fitBounds(linia.getBounds(), { padding: [15, 15] });

    // Marcadors d'inici i final
    L.circleMarker(punts[0], { color: 'green', radius: 6 }).addTo(map);
    L.circleMarker(punts[punts.length - 1], { color: 'red', radius: 6 }).addTo(map);
});
</script>
```

El color `#ea6b24` és el taronja de la teva web, el mateix de `--primary-orange`.

## Recomanació

Ara mateix les activitats de [profile.php](projecte/profile.php) estan escrites a mà a l'HTML. Abans de posar-hi mapes, et convé fer com amb les competicions: una funció `get_ActivitatsInfo()` a `config.php` que retorni les activitats amb `mysqli_fetch_all(..., MYSQLI_ASSOC)`, i un `foreach` a la pàgina. Així cada activitat té les seves dades i la seva ruta.

Un altre detall: amb molts mapes petits la pàgina es fa pesada. Una opció és mostrar el mapa només a l'activitat més recent, o en una pàgina de detall de l'activitat.

Si vols, ho puc implementar jo directament. Abans hauria de mirar com és la taula d'activitats.