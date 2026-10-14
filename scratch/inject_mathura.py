import json

target_file = r'C:\xampp\htdocs\Gleamrealty\app\Models\Setting.php'
with open(target_file, 'r', encoding='utf-8') as f:
    content = f.read()

with open('scratch/mathura_replace.json', 'r', encoding='utf-8') as f:
    data = json.load(f)

for call in data.get('tool_calls', []):
    if call['name'] == 'multi_replace_file_content':
        for chunk in call['args']['ReplacementChunks']:
            target = chunk['TargetContent'].replace('\r\n', '\n')
            replacement = chunk['ReplacementContent'].replace('\r\n', '\n')
            if target in content:
                content = content.replace(target, replacement)
            else:
                print("Failed to replace Mathura chunk")

with open(target_file, 'w', encoding='utf-8', newline='\n') as f:
    f.write(content)
