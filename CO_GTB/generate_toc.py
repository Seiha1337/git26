import re

README_FILE = "readme.md"
TOC_START = "<!-- TOC START -->"
TOC_END = "<!-- TOC END -->"

def slugify(text):
    text = text.strip().lower()
    text = re.sub(r'[^\w\s-]', '', text)  # enlever les signes de ponctuation
    return re.sub(r'\s+', '-', text)

def extract_headings(lines):
    in_code_block = False
    headings = []
    for line in lines:
        if line.strip().startswith("```"):
            in_code_block = not in_code_block
            continue
        if in_code_block:
            continue
        match = re.match(r'^(#{2,6})\s+(.*)', line)
        if match:
            level = len(match.group(1)) - 1  # Démmarrer à 1 pour ##
            title = match.group(2).strip()
            anchor = slugify(title)
            headings.append((level, title, anchor))
    return headings

def build_toc(headings):
    toc = []
    for level, title, anchor in headings:
        indent = "  " * (level - 1)
        toc.append(f"{indent}- [{title}](#{anchor})")
    return toc

def update_readme():
    with open(README_FILE, "r", encoding="utf-8") as f:
        lines = f.readlines()

    headings = extract_headings(lines)
    toc = build_toc(headings)
    toc_block = [TOC_START + "\n"] + [line + "\n" for line in toc] + [TOC_END + "\n"]

    # Remplacer le sommaire existant ou l'insérer au début
    try:
        start = lines.index(TOC_START + "\n")
        end = lines.index(TOC_END + "\n") + 1
        lines = lines[:start] + toc_block + lines[end:]
    except ValueError:
        lines = toc_block + ["\n"] + lines

    with open(README_FILE, "w", encoding="utf-8") as f:
        f.writelines(lines)

    print("✅ Table des matières mise à jour dans readme.md.")

if __name__ == "__main__":
    update_readme()