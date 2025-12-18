#!/usr/bin/env python3
"""Merge an image onto a solid 'celeste agua' background and save as PNG.

Usage:
  python tools/merge_with_bg.py input.jpg
  python tools/merge_with_bg.py input.png output.png --bg #bfefff --padding 20
"""
import os
import sys
from PIL import Image, ImageColor

def main():
    import argparse
    p = argparse.ArgumentParser(description="Merge image onto a solid background (celeste agua by default)")
    p.add_argument('input', help='Input image path')
    p.add_argument('output', nargs='?', help='Output PNG path (optional)')
    p.add_argument('--bg', default='#bfefff', help='Background color (hex or name). Default: #bfefff')
    p.add_argument('--padding', type=int, default=0, help='Padding (px) around the image on the background')
    args = p.parse_args()

    inp = args.input
    if not os.path.isfile(inp):
        print('Error: input file does not exist:', inp, file=sys.stderr)
        sys.exit(2)

    out = args.output or os.path.splitext(inp)[0] + '_con_fondo.png'

    bg_rgb = ImageColor.getrgb(args.bg)

    with Image.open(inp) as im:
        im = im.convert('RGBA')
        w, h = im.size
        pad = max(0, args.padding)
        nw, nh = w + pad*2, h + pad*2

        bg = Image.new('RGBA', (nw, nh), bg_rgb + (255,))
        bg.paste(im, (pad, pad), im)

        bg.save(out)
        print('Saved:', out)

if __name__ == '__main__':
    main()
