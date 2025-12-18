# Fusionar imagen con fondo celeste

Este pequeño script Python toma una imagen y la guarda como PNG sobre un fondo `celeste agua` (#bfefff).

Requisitos:

- Python 3.8+
- Pillow

Instalación (desde el directorio del proyecto):

```bash
pip install Pillow
```

Uso:

```bash
python tools/merge_with_bg.py ruta/a/imagen.jpg

# Opcional: especificar salida, color de fondo y padding (px)
python tools/merge_with_bg.py ruta/a/imagen.png salida.png --bg #bfefff --padding 16
```

El script generará un archivo con sufijo `_con_fondo.png` si no indicas nombre de salida.

Coloca tu imagen en la carpeta del repo (por ejemplo `c:\laragon\www\example-app`) y ejecuta el comando anterior. Si quieres, puedo ejecutar el script aquí si subes el archivo de imagen al workspace o me indicas la ruta exacta donde ya está.
