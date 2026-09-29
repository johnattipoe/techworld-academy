Reset MySQL root password (init-file method)

IMPORTANT: Run these steps as Administrator on Windows.

What this does
- Creates a temporary SQL init file that sets the root password
- Starts mysqld with the init-file to apply the password change
- Restarts the MySQL service

Usage
1. Open PowerShell as Administrator
2. Navigate to the project scripts folder:

```powershell
cd "C:\Users\HP\Desktop\TECHWORLD ACADEMY AND SOLUTION\scripts"
```

3. Run the script (default password: techworld123):

```powershell
.\
eset_mysql_root.ps1 -NewPassword "techworld123"
```

4. After the script completes, verify you can connect:

```powershell
mysql -u root -p
# enter the password you chose
```

Notes & Safety
- This script requires Administrator privileges.
- The init-file method is used because it does not require stopping the service via Services UI, but it does start an instance of mysqld with the init-file — ensure no other mysqld instance is running or the script will attempt to stop the service first.
- Remove the script or change the default password after use to avoid leaving credentials in clear text.
- If your MySQL installation path differs, adjust the `$mysqlBinPath` variable in the script.

If anything fails, open the Services panel (services.msc) and manually start/stop the service named MySQL80 and retry the script.