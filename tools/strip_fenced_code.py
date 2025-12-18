#!/usr/bin/env python3
"""Strip Markdown code fences (``` or ```php) from all files under tests/.

Usage:
  python tools/strip_fenced_code.py

This will edit files in-place. It's safe but please commit or backup before running.
"""
import os

root = os.path.join(os.path.dirname(__file__), '..')
tests_dir = os.path.join(root, 'tests')

if not os.path.isdir(tests_dir):
    print('tests/ directory not found:', tests_dir)
    raise SystemExit(1)

count = 0
for dirpath, dirs, files in os.walk(tests_dir):
    for fname in files:
        path = os.path.join(dirpath, fname)
        with open(path, 'rb') as f:
            data = f.read()
        try:
            text = data.decode('utf-8')
        except UnicodeDecodeError:
            # skip binary files
            continue

        lines = text.splitlines()
        new_lines = [l for l in lines if l.strip() not in ('```', '```php')]
        new_text = '\n'.join(new_lines) + ('\n' if new_lines and not new_lines[-1].endswith('\n') else '')
        if new_text != text:
            with open(path, 'w', encoding='utf-8', newline='\n') as f:
                f.write(new_text)
            print('Fixed:', path)
            count += 1

print(f'Done. Files modified: {count}')
