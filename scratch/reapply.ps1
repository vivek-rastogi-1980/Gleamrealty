$logPath = 'C:\Users\Lenovo\.gemini\antigravity-ide\brain\55391758-96fd-4f78-b5c5-40f00c739449\.system_generated\logs\transcript_full.jsonl'
$lines = Get-Content $logPath

$targetFile = 'C:\xampp\htdocs\Gleamrealty\app\Models\Setting.php'
# Re-checkout base
git checkout 2666d22dbb15d99c5d047df5582f0fd3b9e1e3ac -- $targetFile

$currentContent = Get-Content $targetFile -Raw

foreach ($line in $lines) {
    if ($line -match '"type":"PLANNER_RESPONSE"' -and $line -match '"TargetFile".*"Setting.php"') {
        $json = $line | ConvertFrom-Json
        foreach ($call in $json.tool_calls) {
            if ($call.name -eq 'replace_file_content' -and $call.args.TargetFile -match 'Setting.php') {
                $target = $call.args.TargetContent
                $replacement = $call.args.ReplacementContent
                $currentContent = $currentContent.Replace($target, $replacement)
            } elseif ($call.name -eq 'multi_replace_file_content' -and $call.args.TargetFile -match 'Setting.php') {
                foreach ($chunk in $call.args.ReplacementChunks) {
                    $target = $chunk.TargetContent
                    $replacement = $chunk.ReplacementContent
                    $currentContent = $currentContent.Replace($target, $replacement)
                }
            }
        }
    }
}
Set-Content $targetFile $currentContent
