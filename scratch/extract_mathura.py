import re

log_file = r'C:\Users\Lenovo\.gemini\antigravity-ide\brain\55391758-96fd-4f78-b5c5-40f00c739449\.system_generated\tasks\task-1098.log'
target_file = r'C:\xampp\htdocs\Gleamrealty\app\Models\Setting.php'

with open(log_file, 'r', encoding='utf-8') as f:
    log_content = f.read()

# The function is in the JSON payload inside the log
# We just need to find the substring for "ReplacementContent": "..."
match = re.search(r'"ReplacementContent":"(.*?)","StartLine"', log_content, re.DOTALL)
if match:
    # decode JSON string
    import json
    # wrap in dummy JSON to decode
    dummy = '{"x":"' + match.group(1) + '"}'
    try:
        replacement = json.loads(dummy)['x']
        replacement = replacement.replace('\r\n', '\n')
        
        with open(target_file, 'r', encoding='utf-8') as f:
            content = f.read()
            
        content = content.replace("    public static function getMathuraPlotRateSections(): array\n    {\n         = [\n            'metrics' => [\n                'val_1' => '?35,000', 'lbl_1' => 'Gated Benchmark',\n                'val_2' => '100 Gaj', 'lbl_2' => 'Standard Size',\n                'val_3' => '100%', 'lbl_3' => 'Clear Titles',\n                'val_4' => 'MVDA', 'lbl_4' => 'Sanctioned',\n            ]\n        ];\n        return self::get('plot_rate_mathura_sections', );\n    }\n}", replacement)
        
        with open(target_file, 'w', encoding='utf-8', newline='\n') as f:
            f.write(content)
        print("Successfully replaced getMathuraPlotRateSections")
    except Exception as e:
        print("JSON parse error:", e)
else:
    print("Could not find ReplacementContent in task-1098.log")
