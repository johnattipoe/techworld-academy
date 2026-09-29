param(
    [string]$source = "node_modules",
    [string]$target = "."
)

Write-Host "Syncing vendor assets from $source to dashboard vendor folders..."

$dashTargets = @("admin/dashboard/js/vendor","admin/dashboard/css/vendor","instructors/dashboard/js/vendor","instructors/dashboard/css/vendor")
foreach ($d in $dashTargets) {
    $full = Join-Path -Path $target -ChildPath $d
    if (-not (Test-Path $full)) {
        New-Item -ItemType Directory -Path $full -Force | Out-Null
    }
}

Write-Host "Done. Copy vendor bundles into the created folders and update README files."
