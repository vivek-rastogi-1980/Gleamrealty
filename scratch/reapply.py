import json

log_path = r'C:\Users\Lenovo\.gemini\antigravity-ide\brain\55391758-96fd-4f78-b5c5-40f00c739449\.system_generated\logs\transcript_full.jsonl'
target_file = r'C:\xampp\htdocs\Gleamrealty\app\Models\Setting.php'

with open(target_file, 'r', encoding='utf-8') as f:
    content = f.read().replace('\r\n', '\n')

with open(log_path, 'r', encoding='utf-8') as f:
    for line in f:
        if '"type":"PLANNER_RESPONSE"' in line and 'Setting.php' in line:
            try:
                data = json.loads(line)
                for call in data.get('tool_calls', []):
                    if call['name'] in ['replace_file_content', 'multi_replace_file_content'] and 'Setting.php' in str(call):
                        args = call['args']
                        if call['name'] == 'replace_file_content':
                            target = args['TargetContent'].replace('\r\n', '\n')
                            replacement = args['ReplacementContent'].replace('\r\n', '\n')
                            if target in content:
                                content = content.replace(target, replacement)
                            else:
                                print("Failed to find target in replace_file_content")
                        elif call['name'] == 'multi_replace_file_content':
                            for chunk in args['ReplacementChunks']:
                                target = chunk['TargetContent'].replace('\r\n', '\n')
                                replacement = chunk['ReplacementContent'].replace('\r\n', '\n')
                                if target in content:
                                    content = content.replace(target, replacement)
                                else:
                                    print("Failed to find target in multi_replace_file_content")
            except Exception as e:
                print("Error parsing line:", e)

with open(target_file, 'w', encoding='utf-8', newline='\n') as f:
    f.write(content)
print(f"Final length: {len(content.splitlines())}")
