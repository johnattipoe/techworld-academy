<#
PowerShell script to reset MySQL root password using init-file method.
Run as Administrator.
#>
param(
    [Parameter(Mandatory=$true)]
    [SecureString]$NewPassword
)

$mysqlServiceName = 'MySQL80'
$mysqlBinPath = "C:\Program Files\MySQL\MySQL Server 8.0\bin"
$mysqldPath = Join-Path $mysqlBinPath 'mysqld.exe'
$plainPassword = [Runtime.InteropServices.Marshal]::PtrToStringAuto([Runtime.InteropServices.Marshal]::SecureStringToBSTR($NewPassword))
Write-Host "This script will attempt to reset the MySQL root password."
Write-Host "Make sure you run this PowerShell as Administrator."

if (-not (Test-Path $mysqldPath)) {
    Write-Error "mysqld not found at $mysqldPath. Adjust the path in the script and retry."
    exit 1
}
# Create init file content
$initFile = [System.IO.Path]::GetTempFileName()
$initSql = "ALTER USER 'root'@'localhost' IDENTIFIED BY '$plainPassword'; FLUSH PRIVILEGES;"
Set-Content -Path $initFile -Value $initSql -Encoding ASCII
Write-Host "Created init file at $initFile"

# Stop service if running
Try {
    if ($null -ne (Get-Service -Name $mysqlServiceName -ErrorAction SilentlyContinue)) {
        Write-Host "Stopping service $mysqlServiceName..."
        Stop-Service -Name $mysqlServiceName -Force -ErrorAction Stop
    }
} Catch {
    Write-Warning "Could not stop service $mysqlServiceName (may not be running). Proceeding..."
}

# Start mysqld with init-file
$startInfo = New-Object System.Diagnostics.ProcessStartInfo
$startInfo.FileName = $mysqldPath
$startInfo.Arguments = "--init-file=`"$initFile`" --console"
$startInfo.RedirectStandardOutput = $true
$startInfo.UseShellExecute = $false
$startInfo.CreateNoWindow = $true
Write-Host "Starting mysqld with init-file..."
$process = [System.Diagnostics.Process]::Start($startInfo)
Start-Sleep -Seconds 8

# Attempt to stop the temporary mysqld process
Try {
    if ($process -and -not $process.HasExited) {
        $process.Kill()
        Write-Host "Temporary mysqld process stopped."
    }
} Catch {
    Write-Warning "Could not stop temporary mysqld process. You may need to stop it manually."
}

# Start the service normally
Try {
    Write-Host "Starting service $mysqlServiceName..."
    Start-Service -Name $mysqlServiceName -ErrorAction Stop
    Write-Host "Service started."
} Catch {
    Write-Warning "Failed to start service $mysqlServiceName. Check Windows Services and start it manually."
}

# Remove init file
Try {
    Remove-Item -Path $initFile -Force -ErrorAction Stop
    Write-Host "Removed init file."
} Catch {
    Write-Warning "Could not remove init file at $initFile. Remove it manually."
}

Write-Host "Done. You should now be able to connect as root with the new password you provided."