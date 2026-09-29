# Audit Logs Guide

## Overview
Audit logs record key user and system actions to help with security reviews and troubleshooting.

## Location
- Log file: `logs/audit.log`
- Admin viewer: `Admin-dashboard/audit_logs.php`
- API endpoint: `api/audit_logs.php`

## What is logged
Each line contains: timestamp | user | action | details

## Tips
- Use the admin viewer to quickly scan recent actions
- Download JSON for offline analysis
- Ensure `logs/` directory is writable by the web server
